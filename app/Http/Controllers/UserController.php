<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->user()->isRole != "2") {
            abort(403);
        }
        return view('dashboard.users.index', [
            "users" => User::orderBy('name', 'asc')->paginate(10),
            "active" => "Registered Users"
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.users.create', [
            "active" => "Add New User"
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'username' => 'required|max:70|min:5|unique:users',
            'name' => 'required|max:70',
            'email' => 'required|email:dns|unique:users',
            'isRole' => 'required',
            'password' => 'required|min:8|max:255',
            'confirm' => 'required',
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);
        $validatedData['remember_token'] = Str::random(10);

        if ($request->has('image')) {
            $imageName = $validatedData['username'] . '-profile-' . rand(1, 2000) . '.jpg';
            Storage::move('/profile-photos/' . $request->image, '/profile-photos/' . $imageName);
            $validatedData['image'] = $imageName;
        }

        User::create($validatedData);

        toast('Success add New User', 'success');
        return redirect('/dashboard/su/users');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('dashboard.users.edit', [
            "user" => $user,
            "active" => "Edit User"
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $rules = [
            'name' => 'required|max:70',
            'isRole' => "required",
        ];

        if ($request->username != $user->username) {
            $rules['username'] = 'required|unique:users';
        }
        if ($request->email != $user->email) {
            $rules['email'] = 'required|email:dns|unique:users';
        }

        $validatedData = $request->validate($rules);

        if ($request->has('image')) {
            if ($request->oldImage) {
                Storage::delete("/profile-photos/" . $request->oldImage);
            }
            $imageName = $request['username'] . '-image-' . rand(1, 2000) . '.jpg';
            Storage::move('/profile-photos/' . $request->image, '/profile-photos/' . $imageName);
            $validatedData['image'] = $imageName;
        }

        User::where('username', $user->username)->update($validatedData);

        toast('User has been updated', 'success');
        return redirect('/dashboard/su/users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        if ($user->id == auth()->user()->id) {
            toast('Cannot delete user that logged in', 'error');
            return back();
        } else {
            if ($user->image) {
                Storage::delete('/profile-photos/' . $user->image);
            }
            User::destroy($user->id);
            toast('User has been deleted', 'success');
            return redirect('/dashboard/su/users');
        }
    }
}

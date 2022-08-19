<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.members.index', [
            "members" => Member::orderBy('nis', 'asc')->paginate(10),
            "active" => "All Class Members"
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.members.create', [
            "active" => "Add New Class Member"
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
            'nis' => 'required|unique:members',
            'fullName' => 'required|max:255',
            'words' => 'required',
            'image' => 'image|file|max:1024',
        ]);

        if ($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('member-photos');
        }

        $validatedData['createdBy'] = auth()->user()->id;
        $validatedData['lastEdit'] = auth()->user()->id;
        $validatedData['ig_link'] = $request->ig_link;
        $validatedData['web_link'] = $request->web_link;
        $validatedData['li_link'] = $request->li_link;


        Member::create($validatedData);

        return redirect('/dashboard/members')->with('success', 'New Member has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function show(Member $member)
    {
        return view('dashboard.members.show', [
            "member" => $member,
            "active" => "Class Member / " . $member->fullName
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function edit(Member $member)
    {
        return view('dashboard.members.edit', [
            "member" => $member,
            "active" => "Edit Class Member / " . $member->fullName
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Member $member)
    {
        $rules = [
            'fullName' => 'required|max:255',
            'words' => 'required',
            'image' => 'image|file|max:1024',
        ];

        if ($request->nis != $member->nis) {
            $rules['nis'] = 'required|unique:members';
        }

        $validatedData = $request->validate($rules);


        if ($request->file('image')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validatedData['image'] = $request->file('image')->store('post-images');
        }

        $validatedData['lastEdit'] = auth()->user()->id;
        $validatedData['ig_link'] = $request->ig_link;
        $validatedData['web_link'] = $request->web_link;
        $validatedData['li_link'] = $request->li_link;

        Member::where('id', $member->id)->update($validatedData);

        return redirect('/dashboard/members')->with('success', 'Member has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function destroy(Member $member)
    {
        Member::destroy($member->id);
        return redirect('/dashboard/members')->with('success', 'Member has been deleted!');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;


class DashboardController extends Controller
{
    public function index()
    {

        // Post by month chart
        $monthName = [];
        $postByMonth = [];
        $filteredMonth = [];
        $postCount = [];

        for ($i = 0; $i < 12; $i++) {
            $postByMonth[] = Post::whereRaw('MONTH(moment_date) =' . $i + 1)->count();
        }

        $filteredMonth = array_keys(array_diff($postByMonth, [0]));

        foreach ($filteredMonth as $month) {
            if ($month >= 1) {
                $monthName[] = date('F', mktime(0, 0, 0, $month + 1, 10));
            }
        }

        foreach ($postByMonth as $post) {
            if ($post >= 1) {
                $postCount[] = $post;
            }
        }

        // Post by category chart
        $categoryName = [];
        $postByCategoryCount = [];
        foreach (Category::all() as $cat) {
            $categoryName[] = $cat->name;
            $postByCategoryCount[] = Post::where('category_id', $cat->id)->count();
        }

        // dd($postByMonth, $filteredMonth, $monthName, $postCount);

        if (auth()->user()->isRole == "0") {
            return view('dashboard.main.user-index', [
                "active" => 'Dashboard Statistic'
            ]);
        } else if (auth()->user()->isRole == "1") {
            return view('dashboard.main.admin-index', [
                "active" => 'Dashboard Statistic'
            ]);
        } else {
            return view('dashboard.main.su-index', [
                "active" => 'Dashboard Statistic',
                "postCount" => $postCount,
                "monthName" => $monthName,
                "categoryName" => $categoryName,
                "postByCategoryCount" => $postByCategoryCount,
                "recentPosts" => Post::where('user_id', auth()->user()->id)->orderBy('moment_date', 'desc')->limit(3)->get()
            ]);
        }
    }
}

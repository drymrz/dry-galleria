@extends('dashboard.layouts.main')

@section('container')
@php
use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Carbon\Carbon;
@endphp
<div class="page-content">
    <section class="row flex-column-reverse flex-sm-row align-items-center">
        <div class="col-12 col-lg-9">
            <div class="row">
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-4 py-4-5">
                            <div class="row">
                                <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                    <div class="stats-icon purple mb-2">
                                        <i class="iconly-boldDocument"></i>
                                    </div>
                                </div>
                                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                    <h6 class="text-muted font-semibold">My Posts</h6>
                                    <h6 class="font-extrabold mb-0">{{ Post::where('user_id',
                                        auth()->user()->id)->count() }}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-4 py-4-5">
                            <div class="row">
                                <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                    <div class="stats-icon blue mb-2">
                                        <i class="iconly-boldPaper"></i>
                                    </div>
                                </div>
                                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                    <h6 class="text-muted font-semibold">All Posts</h6>
                                    <h6 class="font-extrabold mb-0">{{ Post::all()->count() }}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-4 py-4-5">
                            <div class="row">
                                <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                    <div class="stats-icon green mb-2">
                                        <i class="iconly-boldCategory"></i>
                                    </div>
                                </div>
                                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                    <h6 class="text-muted font-semibold">Categories</h6>
                                    <h6 class="font-extrabold mb-0">{{ Category::all()->count() }}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-4 py-4-5">
                            <div class="row">
                                <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                    <div class="stats-icon red mb-2">
                                        <i class="iconly-boldProfile"></i>
                                    </div>
                                </div>
                                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                    <h6 class="text-muted font-semibold">Registered User</h6>
                                    <h6 class="font-extrabold mb-0">{{ User::all()->count() }}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-3">
            <div class="card">
                <div class="card-body py-4-5 px-4">
                    <div class="d-flex align-items-center">
                        <div class="avatar avatar-xl">
                            @if (auth()->user()->image)
                            <img src="/storage/profile-photos/{{ auth()->user()->image }}" alt="Face 1">
                            @else
                            <img src="/adminview/assets/images/faces/1.jpg" alt="Face 1">
                            @endif
                        </div>
                        <div class="ms-3 name">
                            <h5 class="font-bold">{{ auth()->user()->name }}</h5>
                            <h6 class="text-muted mb-0">{{ '@' . auth()->user()->username }}</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="row">
        <div class="col-12 col-lg-9">
            <div class="card">
                <div class="card-header">
                    <h4>Posts Statistic 2022</h4>
                </div>
                <div class="card-body">
                    <div id="chart-profile-visit"></div>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-3">
            <div class="card">
                <div class="card-header">
                    <h4>Post by Categories</h4>
                </div>
                <div class="card-body">
                    <div id="chart-visitors-profile">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="row">
        <div class="col-12 col-lg-8 order-2 order-lg-1">
            <div class="card">
                <div class="card-header">
                    <h4>Latest Comments</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-lg">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Comment</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="col-3">
                                        <div class="d-flex align-items-center">
                                            <div class="avatar avatar-md">
                                                <img src="adminview/assets/images/faces/5.jpg">
                                            </div>
                                            <p class="font-bold ms-3 mb-0">Si Cantik</p>
                                        </div>
                                    </td>
                                    <td class="col-auto">
                                        <p class="mb-0">
                                            Congratulations on your graduation!
                                        </p>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="col-3">
                                        <div class="d-flex align-items-center">
                                            <div class="avatar avatar-md">
                                                <img src="adminview/assets/images/faces/2.jpg">
                                            </div>
                                            <p class="font-bold ms-3 mb-0">Si Ganteng</p>
                                        </div>
                                    </td>
                                    <td class="col-auto">
                                        <p class="mb-0">
                                            Wow amazing design! Can you make another
                                            tutorial for this design?
                                        </p>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-4 order-1 order-lg-2">
            <div class="card">
                <div class="card-header">
                    <h4>Your Recent Posts</h4>
                </div>
                <div class="card-content pb-4">
                    @foreach ($recentPosts as $post)
                    <a href="/posts/{{ $post->slug }}" target="_blank">
                        <div class="recent-message d-flex px-4 py-3">
                            <div class="avatar avatar-lg">
                                <img src="{{ asset('storage/post-images/' . $post->images[0]->image_name) }}">
                            </div>
                            <div class="name ms-4">
                                <h5 class="mb-1">{{ $post->title }}</h5>
                                <h6 class="text-muted mb-0">{{ Carbon::parse($post->moment_date)->format('d M Y') }}
                                </h6>
                            </div>
                        </div>
                    </a>
                    @endforeach
                    <div class="px-4">
                        <a href="dashboard/posts">
                            <button class="btn btn-block btn-xl btn-outline-primary font-bold mt-3">
                                Other Posts
                            </button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@section('scripts')
<script>
    var optionsProfileVisit = {
        annotations: {
            position: "back",
        },
        dataLabels: {
            enabled: false,
        },
        chart: {
            type: "bar",
            height: 300,
        },
        fill: {
            opacity: 1,
        },
            plotOptions: {},
            series: [
                {   
                    name: "Total Posts",
                    data: {!! json_encode($postCount) !!},
                },
            ],
        colors: "#435ebe",
        xaxis: {
            categories: [
                {!! str_replace(array("[","]"), "", json_encode($monthName)) !!}
            ]
        }
    };

    let optionsVisitorsProfile = {
        series: {!! json_encode($postByCategoryCount) !!},
        labels: {!! json_encode($categoryName) !!},
        chart: {
            type: "donut",
            width: "100%",
            height: "350px",
        },
        legend: {
            position: "bottom",
        },
        plotOptions: {
            pie: {
            donut: {
            size: "30%",
            },
        },
        },
    };
</script>
<script src="/adminview/assets/js/pages/dashboard.js"></script>
@endsection
@endsection
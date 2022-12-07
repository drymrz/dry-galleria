@extends('dashboard.layouts.main')

@section('container')
@php
use App\Models\Post;
use App\Models\User;
use App\Models\Member;
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
                                    <div class="stats-icon green mb-2">
                                        <i class="iconly-boldPaper"></i>
                                    </div>
                                </div>
                                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                    <h6 class="text-muted font-semibold">Draft Post</h6>
                                    <h6 class="font-extrabold mb-0">{{ Post::where('status','1')->count() }}</h6>
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
                                        <i class="iconly-boldFolder"></i>
                                    </div>
                                </div>
                                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                    <h6 class="text-muted font-semibold">Archived Post</h6>
                                    <h6 class="font-extrabold mb-0">{{ Post::where('status','2')->count() }}</h6>
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
                                        <i class="iconly-boldUser"></i>
                                    </div>
                                </div>
                                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                    <h6 class="text-muted font-semibold">Class Member</h6>
                                    <h6 class="font-extrabold mb-0">{{ Member::all()->count() }}</h6>
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
</div>
@endsection
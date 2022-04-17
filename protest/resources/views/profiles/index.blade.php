@extends('layouts.app')
@section('content')
<h1>My Profile</h1>
<div class="container mt-5">
    <div class="row d-flex justify-content-center">
        <div class="col-md-7">
            <div class="card p-3 py-4">
                <div class="row">
                <div class="col-md-4 text-center"><img src="/img/test_avatar1.jpg" width="75" class="rounded-circle"> </div>
                <div class="col-md-8">
                <span class="bg-info p-1 px-4 rounded text-white">Role-{{ $user->role }}</span>
                <h5 class="card-title popover-test" title="Username">{{ $user->username }}</h5>
                </div></div>                
                <div class="text-center mt-3">
                    <!-- Set authentication-->
                    <span>My Balance: <i class="fa fa-trophy" style="color:goldenrod"></i>
                        1500</span> | 
                    <span>My Phone: {{ $user->phonenumber }}</span>
                    <div class="row">
                        <div class="col-6">
                            <h6><i class="fa fa-user"></i>Bio Description</h6>
                            <div class="pt-1">{{ $user->profile->description }}</div>
                        </div>
                        <div class="col-6" style="border: 1px solid #8E24AA;">
                            <span><a href="#" class="btn-a1 popover-test" title="Change password">Change password</a></span><br>
                            @can ('update', $user -> profile)
                            <span><a href="/profile/{{ $user->id }}/edit" class="btn-a1 popover-test" title="Edit profile">Edit profile</a></span>
                            @endcan
                            <ul class="social-list">
                                <li><i class="fa fa-facebook"></i></li>
                                <li><i class="fa fa-linkedin"></i></li>
                                <li><i class="fa fa-google popover-test" title="{{ $user->email }}"></i></li>
                            </ul>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-4">
                            <h6>{{ $user->posts->count() }}</h6>
                            <p>Post</p>
                        </div>
                        <div class="col-4">
                            <h6>???</h6>
                            <p>Likes</p>
                        </div>
                        <div class="col-4">
                            <h6>{{ $user->comments->count() }}</h6>
                            <p>Comments</p>
                        </div>                        
                        <div class="col-4">
                            <h6>???</h6>
                            <p>Followers</p>
                        </div>
                    </div>
                    <hr>
                    <div class="buttons"> <button class="btn btn-outline-primary px-4">Contact</button>
                        <button class="btn btn-primary px-4 ms-3">Follow</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<hr>
<div class="row pt-5">
    <p>Your post</p>
    @foreach( $user->posts as $post)
    <div class="col-md-4 p-3">
        <div>Post ID:{{ $post->id }}</div>
        <div class="justify-content-between">
            <a href="/post/{{ $post->id }}"><button class="btn btn-info">View post</button></a>
        </div>
    </div>
    @endforeach
</div>
</div>

<style>
    .card {
        border: none;
        position: relative;
        overflow: hidden;
        border-radius: 8px;
        background: linear-gradient(lightgrey, #d6d6d6, #ebecf0);
    }

    .card:before {
        content: "";
        position: absolute;
        left: 0;
        top: 0;
        width: 4px;
        height: 100%;
        background: #e9f;
        transform: scaleX(2);
        transition: all 0.5s;
    }

    .card:after {
        content: "";
        position: absolute;
        left: 0;
        top: 0;
        width: 4px;
        height: 100%;
        background: #8E24AA;
        transform: scaleX(0);
        transition: all 0.3s;
    }

    .card:hover::after {
        transform: scaleX(2)
    }

    .social-list {
        display: flex;
        list-style: none;
        justify-content: center;
        padding: 0;
    }

    .social-list li {
        padding: 10px;
        color: #8E24AA;
        font-size: 19px;
    }

    .buttons button:nth-child(1) {
        border: 1px solid #8E24AA;
        color: #8E24AA;
        height: 30px;
    }

    .buttons button:nth-child(1):hover {
        border: 1px solid #8E24AA;
        color: #fff;
        height: 30px;
        background-color: #8E24AA;
    }

    .buttons button:nth-child(2) {
        border: 1px solid #8E24AA;
        background-color: #8E24AA;
        color: #fff;
        height: 30px;
    }
    
    .col-md-8 {
        padding-top: 10px
    }
    
    .col-md-4 {
        margin: auto
    }
    @media only screen and (max-width: 800px) {
        .row {
            text-align: center
        }
    }
</style>
@endsection
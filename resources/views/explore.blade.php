@extends('layouts.app')

@section('content')
<div class="container-fluid mt-5">
    <div class="row">

        <!-- left bar
    ======================================== -->
        <div class="cold-md-2 offset-md-1 sidebars">
            @include ('sidebar-links')
        </div>

        <!-- posts content
    =========================================== -->

        <div class="col-md-6 offset-md-1">

            <h1 class="mb-4">
                Explorer
            </h1>

            <div class="row">

                @foreach ($users as $user)

                <div class="col-md-12 mb-5">

                <a href="{{ route('profile', $user) }}" class="d-flex align-items-center text-secondary">

                <img src="{{ $user->avatar }}" alt="{{ $user->username }}" class="rounded-circle">

                <h2 class="ml-3">{{ $user->chickname }}</h2>

                </a>

                </div>


                @endforeach

            </div>

        </div>

        <!-- right bar
================================================ -->
        <div class="col-md-2 text-center sidebars" id="friendsList">
            @include ('friends-list')
        </div>

    </div>
</div>
@endsection
@extends('layouts.app')

@section('content')
<div class="container-fluid mt-5">
    <div class="row">

        <!-- left bar
    ======================================== -->
        <div class="cold-md-2 offset-md-1">
            @include ('sidebar-links')
        </div>

        <!-- search content
    =========================================== -->

        <div class="col-md-6 offset-md-1">

            @foreach ($chicks as $chick)

            <h2>{{ $chick->user->chickname }}</h2>
            <p>{{ $chick->content }}<br>
            <small>{{ $chick->tags }}</small></p>

            @endforeach

        </div>


        <!-- right bar
================================================ -->
        <div class="col-md-2 text-center" id="friendsList">
            @include ('friends-list')
        </div>

    </div>
</div>
@endsection
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

            <!-- chick box -->
            @include ('chick-box')

            <!-- posts content -->

            @include ('timeline')

        </div>




        <!-- right bar
    ================================================ -->
        <div class="col-md-2 text-center sidebars" id="friendsList">
            @include ('friends-list')
        </div>

    </div>
</div>
@endsection
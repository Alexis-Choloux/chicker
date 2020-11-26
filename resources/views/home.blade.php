@extends('layouts.app')

@section('content')
<div class="container-fluid mt-5">
    <div class="row">

        <!-- left bar
    ======================================== -->
        <div class="cold-md-2 offset-md-1">
            @include ('sidebar-links')
        </div>

        <!-- posts content
    =========================================== -->

        <div class="col-md-6 offset-md-1">

            <!-- chick box -->
            @include ('chick-box')

            <!-- posts content -->
            <div class="row mt-4" id="postContent">

                @foreach ($chicks as $chick)

                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-2 text-center" id="avatar">
                            <img src="/images/fake-profil.jpg" alt="" height="50" class="mt-2">
                        </div>

                        <div class="col-md-10 mt-2">
                            <h5>{{ $chick->user->chickname }} <small>{{ $chick->created_at }}</small></h5>

                            <p>{{ $chick->content }}<br>
                            <small>{{ $chick->tags }}</small></p>

                        </div>
                    </div>
                </div>
                @endforeach

            </div>

        </div>




        <!-- right bar
    ================================================ -->
        <div class="col-md-2">

        </div>

    </div>
</div>
@endsection
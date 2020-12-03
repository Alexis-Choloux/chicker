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

            @forelse ($chicks as $chick)

            <div class="row d-flex align-items-center">
                <div class="col-md-2 text-center">
                    <a href="{{ route('profile', $chick->user_chickname) }}">

                        <img src="https://i.pravatar.cc/150?u={{ $chick->user_chickname }}" alt="" height="50" class="mt-2 rounded-circle">
                    </a>
                </div>

                <div class="col-md-10">
                    <h2>{{ $chick->user_chickname }}
                        <small class="text-muted">{{ $chick->chick_created }}</small>
                    </h2>
                </div>
            </div>

            <div class="row">
                <div class="col-md-10 offset-md-2">
                    
                    <a href="{{ route('chicks.show', $chick->id) }}" class="text-dark textHover">

                        <p>{{ $chick->chick_content }}<br>
                            <small>{{ $chick->chick_tags }}</small></p>
                    </a>

                </div>
            </div>


            @empty
            <p>Pas de chick ou de tags correspondant à votre recherche !</p>

            @endforelse

        </div>


        <!-- right bar
================================================ -->
        <div class="col-md-2 text-center" id="friendsList">
            @include ('friends-list')
        </div>

    </div>
</div>
@endsection
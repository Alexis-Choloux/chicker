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

            <div class="row">
                <div class="col-md-12 text-center">
                    <img src="/images/default-profile-banner.jpg" alt="" width="100%" class="rounded">
                </div>
            </div>


            <div class="row mt-2">
                <div class="col-md-4 text-left">
                    <h2>{{ $user->chickname }}</h2>
                    <p>Inscrit {{ $user->created_at->diffForHumans() }}</p>
                </div>

                <div class="col-md-4 text-center">
                    <img src="{{ $user->avatar }}" alt="profile-img" class="rounded-circle" id="profileImg">
                </div>

                <div class="col-md-4 d-flex justify-content-end">

                    @if (auth()->user()->is($user))
                    <a href="{{ route('edit-password', $user) }}">
                            <button type="submit" class="btn btn-light shadow mr-2">Changer mot de passe</button>
                        </a>
                        <a href="{{ route('edit', $user) }}">
                            <button type="submit" class="btn btn-light shadow">Editer</button>
                        </a>

                    @endif


                    @include ('components/following-button')

                </div>
            </div>


            @include ('timeline', [
            'chicks' => $user->chicks
            ])

        </div>





        <!-- right bar
    ================================================ -->
        <div class="col-md-2 text-center" id="friendsList">
            @include ('friends-list')
        </div>

    </div>
</div>
@endsection
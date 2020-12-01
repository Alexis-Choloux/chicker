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

            <h1>
                Edition du profil
            </h1>

            <form method="POST" action="{{ route('profile', $user) }}"> 
                @csrf
                @method('PATCH')

                <div class="form-group">

                    <label for="email">
                        Email
                    </label>
                    <input type="email" name="email" id="email" class="form-control" value="{{ $user->email }}" required>

                    @error('email')
                    <p>{{ $message }}</p>
                    @enderror

                </div>

                <div class="form-group">

                    <label for="firstName">
                        Prénom
                    </label>
                    <input type="text" name="firstName" id="firstName" class="form-control" value="{{ $user->first_name }}" required>

                    @error('firstName')
                    <p>{{ $message }}</p>
                    @enderror

                </div>

                <div class="form-group">

                    <label for="lastName">
                        Prénom
                    </label>
                    <input type="text" name="lastName" id="lastName" class="form-control" value="{{ $user->last_name }}" required>

                    @error('lastName')
                    <p>{{ $message }}</p>
                    @enderror

                </div>

                <div class="form-group">

                    <label for="chickname">
                        Chickname
                    </label>
                    <input type="text" name="chickname" id="chickname" class="form-control" value="{{ $user->chickname }}" required>

                    @error('chickname')
                    <p>{{ $message }}</p>
                    @enderror

                </div>

                <div class="form-group">

                    <label for="password">
                        Mot de passe
                    </label>
                    <input type="password" name="password" id="password" class="form-control" required>

                    @error('password')
                    <p>{{ $message }}</p>
                    @enderror

                </div>

                <div class="form-group">

                    <label for="password_confirmation">
                        Confirmation mot de passe
                    </label>
                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required>

                    @error('password_confirmation')
                    <p>{{ $message }}</p>
                    @enderror

                </div>

                <button type="submit" class="btn btn-warning">
                    Modifier
                </button>



            </form>
        </div>

        <!-- right bar
================================================ -->
        <div class="col-md-2 text-center" id="friendsList">
            @include ('friends-list')
        </div>

    </div>
</div>
@endsection
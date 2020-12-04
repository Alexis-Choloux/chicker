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
                Edition du mot de passe
            </h1>

            <form method="POST" action="{{ route('update-password', $user) }}" name="editPassword"> 
                @csrf
                @method('PATCH')

                <div class="form-group">

                    <label for="oldPassword">
                        Ancien mot de passe
                    </label>
                    <input type="password" name="oldPassword" id="oldPassword" class="form-control" required>

                    @error('oldPassword')
                    <p>{{ $message }}</p>
                    @enderror

                <div class="form-group">

                    <label for="password">
                        Nouveau mot de passe
                    </label>
                    <input type="password" name="password" id="password" class="form-control" required>

                    @error('password')
                    <p>{{ $message }}</p>
                    @enderror

                </div>

                <div class="form-group">

                    <label for="password_confirmation">
                        Confirmation nouveau mot de passe
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

    </div>

        <!-- right bar
================================================ -->
        <div class="col-md-2 text-center" id="friendsList">
            @include ('friends-list')
        </div>

    </div>
</div>
@endsection
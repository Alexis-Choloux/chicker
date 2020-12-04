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

            <div class="row">

                <div class="col-md-2 text-center" id="avatar">

                    <a href="{{ route('profile', $chick->user) }}">

                        <img src="{{ $chick->user->avatar }}" alt="" height="50" class="mt-2 rounded-circle">
                    </a>
                </div>


                <div class="col-md-10 mt-2">

                    <div class="row">
                        <div class="col-md-12 d-flex">

                            <a href="{{ route('profile', $chick->user) }}" class="text-dark textHover">
                                <h4><b>{{ $chick->user->chickname }}</b> <small class="text-muted">{{ $chick->created_at }}</small></h4>
                            </a>

                            @include ('chick-edit')

                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">

                            <p>{{ $chick->content }}<br>
                                <small>{{ $chick->tags }}</small></p>

                        </div>
                    </div>
                </div>
            </div>


            <!-- commentaires -->
            <div class="row">
                <div class="col-md-12 mt-2 mb-3">


                    <!-- comment box -->
                    <form method="POST" action="{{ route('comments.store') }}" id="commentBox">

                        @csrf

                        <div class="row">
                            <div class="col-md-2">
                                <img src="{{ auth()->user()->avatar }}" alt="image" height="50" class="ml-5" id="chickPic">
                            </div>

                            <div class="col-md-10">
                                <div class="form-group">
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="1" name="content" placeholder="Poussin commentaire !">
                                    </textarea>
                                    <input class="form-control form-control-sm" id="tagsComment" name="tags" type="text" placeholder="#WhateverYouWant">
                                </div>


                            </div>
                        </div>



                        <div class="row">
                            <div class="col-md-12 text-right">
                                <input type="hidden" value="{{ $chick->id }}" name="chickId">
                                <input type="submit" value="Commenter !" class="btn btn-warning mt-1" name="comment">
                            </div>
                        </div>

                        @error('commentPost')
                        <div>
                            <p class="text-danger ml-1">{{ $message }}</p>
                        </div>
                        @enderror

                    </form>

                </div>
            </div>


            <!-- user comments -->
            @forelse ($chick->comments as $comment)

            <div class="row">
                <div class="col-md-10 offset-md-2">


                    <div class="row">

                        <div class="col-md-2 text-center" id="avatar">

                            <a href="{{ route('profile', $comment->user) }}">

                                <img src="{{ $comment->user->avatar }}" alt="" height="50" class="mt-2 rounded-circle">
                            </a>
                        </div>


                        <div class="col-md-10 mt-2">

                            <div class="row">
                                <div class="col-md-12 d-flex">

                                    <a href="{{ route('profile', $comment->user) }}" class="text-dark">
                                        <h4><b>{{ $comment->user->chickname }}</b> <small class="text-muted">{{ $comment->created_at }}</small></h4>
                                    </a>

                                    @include('comment-edit')

                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">

                                    <p>{{ $comment->content }}<br>
                                        <small>{{ $comment->tags }}</small></p>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @empty
            <p class="ml-3"><b>Pas de commentaires publiés pour ce Chick. Soyez le premier !</b></p>

            @endforelse


        </div>


        <!-- right bar
    ================================================ -->
        <div class="col-md-2 text-center sidebars" id="friendsList">
            @include ('friends-list')
        </div>

    </div>
</div>
@endsection
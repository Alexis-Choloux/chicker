<?php $commentsNumber = count($chick->comments) ?>

<div class="row">
    <div class="col-md-12">

        <button class="btn btn-sm btn-secondary mb-2" type="button" data-toggle="collapse" 
        data-target="#collapseComments{{ $chick->id }}" aria-expanded="false" 
        aria-controls="collapseComments{{ $chick->id }}" id="commentBtn">
            Commentaires
            <span class="badge badge-dark">
                    {{ $commentsNumber }}
            </span>
                
        </button>
        


        <div class="collapse" id="collapseComments{{ $chick->id }}">
            <div class="card card-body mb-2">

                <div class="row">
                    <div class="col-md-12">


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

                @empty
                <p class="ml-3"><b>Pas de commentaires publiés pour ce Chick. Soyez le premier !</b></p>

                @endforelse


            </div>
        </div>
    </div>
</div>
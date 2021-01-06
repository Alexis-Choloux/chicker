<div class="row mt-4" id="timeline">


    <div class="col-md-12" id="postContent">

        @forelse ($chicks as $chick)

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


                <a href="{{ route('chicks.show', $chick) }}" class="text-dark textHover">
                    <div class="row">
                        <div class="col-md-12">

                            <p>{{ $chick->content }}<br>
                                <small>{{ $chick->tags }}</small>
                                </p>
                             
                        </div>
                    </div>
                </a>


            </div>
        </div>


        @include ('comments')




        @empty
        <p class="ml-3"><b>Pas de chicks publiés</b></p>

        @endforelse

    </div>
</div>
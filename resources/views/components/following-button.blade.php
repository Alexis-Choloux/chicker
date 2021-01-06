@unless (auth()->user()->is($user))

<form method="POST" action="/profile/{{ $user->chickname }}/follow">
                    @csrf
                        <a href="">
                            <button type="submit" class="btn btn-warning shadow ml-3"> 
                                    {{ auth()->user()->isFollowing($user) ? 'Se désabonner' : 'S\'abonner' }}
                            </button>
                        </a>
                    </form>

@endif
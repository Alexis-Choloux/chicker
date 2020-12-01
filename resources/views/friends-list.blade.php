<h3 class="mb-3"><b>Abonnements</b></h3>

<ul class="list-unstyled">

    @forelse (auth()->user()->follows as $users)

    <li>

        <a href="{{ route('profile', $users) }}">
            <img src="{{ $users->avatar }}" alt="" height="80" class="rounded-circle">

            <p class="text-dark">{{ $users->chickname }}</p>
        </a>

    </li>

    @empty
    <p>Aucun abonnement</p>

    @endforelse

</ul>
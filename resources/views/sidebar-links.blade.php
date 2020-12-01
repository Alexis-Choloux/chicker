<ul id="leftSidebar" class="list-unstyled">

    <li>
        <a href="{{ route('home') }}">
            Accueil
        </a>
    </li>

    <li class="mt-5">
        <a href="{{ route('explore') }}">
            Explorer
        </a>
    </li>

    <li class="mt-5">
        <a href="{{ route('profile', $user = auth()->user()->chickname) }}">
            Profil
        </a>
    </li>

</ul>
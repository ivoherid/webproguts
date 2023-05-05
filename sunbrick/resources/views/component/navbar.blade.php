<header>
    <nav class="navbar">
        <h5 class="navbar-title">Sun<span>brick</span></h5>
        <div class="container-nav">
            <a href="/user/{{ $user->id }}/home" class="navbar-brand">
                <img src="{{ asset('img/img_person.png') }}" alt="Logo" height="24" class="align-text-top">
                Profile
            </a>
            <a href="/user/{{ $user->id }}/transaction" class="navbar-brand">
                <img src="{{ asset('img/mailheader.png') }}" alt="Logo" height="24" class="align-text-top">
                Transaction
            </a>
        </div>
        <div class="navbar-extra" style="background: none;">
            @if ($user->id == 1)
                <a href="/user/2/home">
                    <button style="background: none;" class="member-level">{{ $user->loyalty }} Level</button>
                </a>
            @elseif($user->id == 2)
                <a href="/user/1/home">
                    <button style="background: none;" class="member-level">{{ $user->loyalty }} Level</button>
                </a>
            @endif
        </div>
    </nav>

    </div>
</header>

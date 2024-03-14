<a href="">
    @if(auth()->check() && auth()->user()->isAdmin())
        <img class="w-72" src="{{ asset('assets/img/LogoB&W.png') }}" alt="">
    @else
        <img class="w-72" src="{{ asset('assets/img/Logo.png') }}" alt="">
    @endif
</a>
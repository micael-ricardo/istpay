<nav class="navbar bg-dark" data-bs-theme="dark">
    <div class="container-fluid">
        @auth
        <a class="navbar-brand" href="{{ route('adm.dashboard') }}">
            <i class="bi bi-speedometer"></i> Minhas Candidaturas
        </a>
        @endauth
        <ul class="navbar-nav ms-auto">
            @if (auth()->check())
                <li class="nav-item text-light">
                    Bem vindo, {{ Auth::user()->name }}!
                </li>
            @else
                <li class="nav-item text-light">
                    Bem vindo!!
                </li>
            @endif
        </ul>
        <ul class="navbar-nav ms-auto">
            <li class="nav-item">
                <form action="/logout" method="POST">  
                    @csrf
                    <button type="submit" class="nav-link">Sair  <i class="bi bi-box-arrow-right"></i></button>
                </form>
            </li>
        </ul>
    </div>
</nav>
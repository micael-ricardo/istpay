<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>

    {{-- jQuery --}}
    <script src="https://code.jquery.com/jquery-3.6.4.js"></script>
    {{-- InputMask --}}
    <script src="https://cdn.jsdelivr.net/npm/inputmask@5.0.8/dist/jquery.inputmask.min.js"></script>
    {{-- moment --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">
    {{-- DataTables --}}
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css" />

    {{-- Estilo do sistema --}}
    <link rel="stylesheet" href="{{ asset('css/geral.css') }}">
</head>

<body>
    @include('template.header')
    @include('template.sidebar') 
    
    <div id="conteudo" class="col py-3">
        @yield('conteudo')
    </div>

    {{-- Bootstrap --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>
    {{-- DataTables --}}
    <script type="text/javascript" src="//cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
</body>

</html>

{{-- <body>
    <nav class="navbar bg-dark" data-bs-theme="dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('adm.dashboard') }}">
                <i class="bi bi-speedometer"></i> Dashboard
            </a>
            <ul class="navbar-nav ms-auto">
                <li class="nav-item text-light">
                    Bem vindo, {{ Auth::user()->nome }}!
                </li>
            </ul>
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <form action="/logout" method="POST">  --}}
                        {{-- @csrf --}}
                        {{-- <a href="{{ route('logout') }}" class="nav-link">Sair  <i class="bi bi-box-arrow-right"></i></a> --}}
                    {{-- </form>
                </li>
            </ul>
        </div>
    </nav>
    
    <div class="container-fluid">
        <div class="row flex-nowrap">
            <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0">
                <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
                    <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start"
                        id="menu">
                        @auth
                            <li> 
                                <a href="{{ route('vagas') }}" class="nav-link px-0 align-middle"> 
                                <i class="fs-4 bi-coin"></i><span class="ms-1 d-none d-sm-inline">Despesas</span></a>
                            </li>
                            <li>
                                <a href="#" class="nav-link px-0 align-middle">
                                    <i class="fs-4 bi-people"></i> <span class="ms-1 d-none d-sm-inline">Usuarios</span>
                                </a>
                            </li>
                        @endauth
                    </ul>
                    <hr>
                </div>
            </div>
            <div id="conteudo" class="col py-3">
                @yield('conteudo')
            </div>
        </div>
    </div> 




    {{-- boodstrap --}}
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script> --}}
    {{-- datatable --}}
    {{-- <script type="text/javascript" src="//cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script> --}}
{{-- 
</body>

</html> --}}

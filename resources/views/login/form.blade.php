@if($mensagem = Session::get('erro'))
{{ $mensagem }}
@endif

@if ($errors->any())
    @foreach ($errors->all() as $error)
        {{ $error }} <br>
    @endforeach
@endif

<form action="{{ route('login.auth')}}" method="post">
@csrf

Email: <br> <input type="email" name="email"> <br>
Senha: <br> <input type="password" name="password"> <br>

<button type="submit"> Entrar </button>

</form>
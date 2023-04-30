@if($mensagem = Session::get('erro'))
{{ $mensagem }}
@endif

@if ($errors->any())
    @foreach ($errors->all() as $error)
        {{ $error }} <br>
    @endforeach
@endif

<form action="{{ route('usuario.store')}}" method="post">
@csrf

Nome: <br> <input  name="nome"> <br>
Email: <br> <input type="email" name="email"> <br>
Senha: <br> <input type="password" name="password"> <br>

<button type="submit"> Salvar </button>

</form>
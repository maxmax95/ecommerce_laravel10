@if($mensagem = Session::get('erro'))
    <p>{{ $mensagem }}</p>
@endif

@if($errors->any())
    @foreach($errors->all() as $error)
        {{ $error }}<br>
    @endforeach
@endif

<form action="{{ route('login/auth')}}" method="POST">
    @csrf

    Email: <br> <input type="email" name="email"><br>
    Password: <br> <input type="password" name="password"><br>

    <input type="checkbox" name="remember"> Remind me
    <button type="submit"> Entrar </button>
</form>
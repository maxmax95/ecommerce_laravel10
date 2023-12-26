

@if($errors->any())
    @foreach($errors->all() as $error)
        {{ $error }}<br>
    @endforeach
@endif

<form action="{{ route('users.store')}}" method="POST"> {{--aqui a rota deve ser com "ponto"(.) pois é uma rota "resource" que busca dentro de si no controller(users) o metodo escolhido...--}}
    @csrf
    Name: <br> <input type="text" name="firstName"><br>
    Last Name: <br> <input type="text" name="lastName"><br>
    Email: <br> <input type="email" name="email"><br>
    Password: <br> <input type="password" name="password"><br>
    <input type="hidden" name="id_role" value=1>

    <button type="submit"> Register! </button>
</form>
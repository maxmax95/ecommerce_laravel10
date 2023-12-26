<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <title>@yield('title')</title>
</head>
<body>
    
    <ul id='dropdown1' class='dropdown-content'>
        @foreach($categoriesMenu as $categoryMenu)
        <li><a href="{{ route('site/categories', $categoryMenu->id )}}">{{ $categoryMenu->categoryName }}</a></li>
        @endforeach
    </ul>
    <ul id='dropdown2' class='dropdown-content'>
      
      <li><a href="{{ route('admin/dashboard')}}">Dashboard</a></li>
      <li><a href="{{ route('site/logout')}}">Logout</a></li>
      
  </ul>

    <nav class="red">
        <div class="nav-wrapper center">
          <a href="/" class="brand-logo center">E-comm Model</a>

          <ul id="nav-mobile" class="left">
            <li><a href="{{route('home/index')}}">Home</a></li>
            <li><a href="" class="dropdown-trigger" data-target='dropdown1'>Categories<i class="material-icons right">expand_more</i></a></li>
            <li><a href="{{route('site/cart')}}" class="">Shop Cart<span class="new badge blue" data-badge-caption="">{{\Cart::getContent()->count()}}</span></a></li>
          </ul>
          @auth
          <ul id="nav-mobile" class="right">
            <li><a href="" class="dropdown-trigger" data-target='dropdown2'>  
                Hello, {{auth()->user()->firstName}} {{auth()->user()->lastName}}
                <i class="material-icons right">expand_more</i></a></li>
              </ul>
          @else 
            
          <ul id="nav-mobile" class="right bottom" class="dropdown-trigger">
            <li><a href="{{route('login/form')}}" >  
                Login<i class="material-icons right">lock</i></a></li>
              </ul> 
          @endauth
{{--
          @if (!empty(session('sessionUser')->firstName))
          <ul id="nav-mobile" class="right">
            <li><a href="" class="dropdown-trigger" data-target='dropdown2'>  
                Hello, {{session('sessionUser')->firstName}} {{session('sessionUser')->lastName}}
                <i class="material-icons right">expand_more</i></a></li>
              </ul>
              @else
              <ul id="nav-mobile" class="right mid">
                <li>  Hello Guest!</li>
                  </ul>    
              @endif
--}}      
        </div>
      </nav>

    @yield('content')
    

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>  
    <script>
        /* Dropdpwn */
            var elemDrop = document.querySelectorAll('.dropdown-trigger');
            var instanceDrop = M.Dropdown.init(elemDrop, {
            coverTrigger: false,
            constrainWidth: false
        
        });
        
            $('.dropdown-trigger').dropdown();    
    </script>      

</body>
</html>
@extends('site\layout') 
@section('title', 'My Cart')
@section('content')
<div class="row container">
    
    @if($message = Session::get('success'))
        <div class="card green darken-1">
            <div class="card-content white-text">
              <span class="card-title">Congratulations!</span>
              <p>{{$message}}</p>
            </div>
        </div>
    @endif

    @if($message = Session::get('successRemove'))
    <div class="card green darken-1">
        <div class="card-content white-text">
          <span class="card-title">Congratulations!</span>
          <p>{{$message}}</p>
        </div>
    </div>
    @endif

    @if($message = Session::get('successRefresh'))
    <div class="card green darken-1">
        <div class="card-content white-text">
          <span class="card-title">Congratulations!</span>
          <p>{{$message}}</p>
        </div>
    </div>
    @endif
    
    @if($message = Session::get('successClear'))
    <div class="card blue">
        <div class="card-content white-text">
          <span class="card-title">Ok!</span>
          <p>{{$message}}</p>
        </div>
    </div>
    @endif

  @if($itens->count() == 0)

  <div class="card orange">
    <div class="card-content white-text">
      <span class="card-title">Your cart is empty!</span>
      <p>Come check our products and discounts!</p>
    </div>
  </div>

  @else
  <h4> My Cart</h4>
    <h5> Your cart now have {{$itens->count()}} @if ($itens->count() > 1) itens @else item @endif </h5>
      <table class="stripped">
        <thead>
          <tr>
              <th></th>
              <th>Item Name</th>
              <th>Quantity</th>
              <th>Price</th>
              <th>Actions</th>
          </tr>
        </thead>

        <tbody>
            @foreach ($itens as $item)
            <tr>
              <td><img src="{{$item->attributes->image}}" alt="" width="70" class="responsive img circle"></td>
              <td>{{$item->name}}</td>
              <td>R$ {{number_format($item->price, 2, ',', '.')}}</td>

              {{--BTN REFRESH--}}
              <form action="{{route('site/refreshCart')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{$item->id}}">
                <td><input style="width: 40px; font-wight:900;" class="white center" min="1" type="number" name="quantity" value="{{$item->quantity}}"></td>
                <td>
                <button class="btn-floating waves-effect waves-light orange" ><i class="material-icons">refresh</i></button>
              </form>

                {{--BTN REMOVE--}}
                <form action="{{ route('site/removeItemCart') }}" method="POST" enctype="multipart/form-data">
                  @csrf
                  <input type="hidden" name="id" value="{{$item->id}}">
                  <button class="btn-floating waves-effect waves-light red" ><i class="material-icons">delete</i></button>
                </form>
              </td>
          </tr>
          @endforeach  
        </tbody>
      </table>

    <div class="card orange">
      <div class="card-content white-text">
        <span class="card-title">{{number_format(\Cart::getTotal(), 2, ',', '.')}} R$</span>
        <p>You cand pay in 12x on credit card!</p>
      </div>
    </div>
  @endif
    
      <div class="row container center">
        <br>

        <a href="{{route('home/index')}}" class="btn waves-effect waves-light blue">Continue shopping<i class="material-icons right">arrow_back</i></a>
        
        <a href="{{route('site/clearCart')}}" class="btn waves-effect waves-light blue">Clear Cart<i class="material-icons right">clear</i></a>
        

        <button class="btn waves-effect waves-light green">Finish Purchase<i class="material-icons right">check</i></button>
    
</div>


    
@endsection
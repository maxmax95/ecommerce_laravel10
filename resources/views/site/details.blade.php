@extends('site\layout') 

@section('title', 'details')

@section('content')
<div class="row container"> <br>
    <div class="col s12 m6">
        <img src="{{$product->image}}" class="responsive-img">
    </div>
    <div class="col s12 m5">
        <div class="card-content">
            <h4 class="container left ">{{$product->name}}</h4><br><br>
            <h3> R$ {{number_format($product->price, 2, ',', '.')}}</h3><br>
            <p>{{Str::limit($product->description,150)}}</p>

            <form action="{{ route('site/addCart') }}" method="POST" enctype="multipart/form-data">
            @csrf
                <input type="hidden" name="id" value="{{$product->id}}">
                <input type="hidden" name="name" value="{{$product->name}}">
                <input type="hidden" name="price" value="{{$product->price}}">
                <input type="number" min="1" name="qty" value="1">
                <input type="hidden" name="image" value="{{$product->image}}">

            <button class="btn red btn large">Comprar</button><br><br><br><br>
            </form>
            
            <small class="right">Postado por: {{$product->users->firstName}} {{$product->users->lastName}}</small><br>
            <small class="right">Categoria: {{$product->categories->categoryName}}</small>
          </div>
    </div>
</div>

@endsection
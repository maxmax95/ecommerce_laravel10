@extends('site\layout') 

@section('title', 'Category: {{$category->categoryName}}')

@section('content')
<div class="row container" style="border:1px solid black;">
  <h4> Category: {{$category->categoryName}}</h4> 
    @foreach ($products as $product)

    <div class="col s12 m4" style="border:1px solid black;">
        <div class="card">
            <div class="card-image">
              <img src="{{$product->image}}">
              <span class="card-title">{{$product->name}}</span>
              <a href="{{route('site/details', $product->slug)}} " class="btn-floating halfway-fab waves-effect waves-light red"><i class="material-icons">add_shopping_cart</i></a>
            </div>
            <div class="card-content">
              <p>{{Str::limit($product->description,30)}}}</p>
            </div>
          </div>
    </div>
    @endforeach
</div>

<div class="row">
        <div class="center">{{$products->links('custom/pagination') }} 
        </div>
    </div>
    
@endsection
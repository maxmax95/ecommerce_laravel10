@extends('admin/layout')
@section('titulo', 'Produtos')
@section('conteudo')
<div class="fixed-action-btn">
    <a  class="btn-floating btn-large bg-gradient-green modal-trigger" href="#create">
      <i class="large material-icons">add</i>
    </a>   
  </div>

@include('admin/produtos/create')


    <div class="row container crud">
      
            <div class="row titulo ">              
              <h1 class="left">Produtos</h1>
              <span class="right chip">This page is showing you {{$products->count()}} products</span>  
            </div>

           <nav class="bg-gradient-blue">
            <div class="nav-wrapper">
              <form>
                <div class="input-field">
                  <input placeholder="Pesquisar..." id="search" type="search" required>
                  <label class="label-icon" for="search"><i class="material-icons">search</i></label>
                  <i class="material-icons">close</i>
                </div>
              </form>
            </div>
          </nav>     

            <div class="card z-depth-4 registros" >
              @include('admin/includes/mensagens')
            <table class="striped ">
                <thead>
                  <tr>
                    <th></th>
                    <th>ID</th>  
                    <th>Product</th>
                      
                      <th>Price</th>
                      <th>Category</th>
                      <th></th>
                  </tr>
                </thead>
        
                <tbody>
                @foreach ($products as $product)
                <tr>
                  <td><img src="{{ $product->image }}" class="circle "></td>
                  <td>{{$product->id}}</td>
                  <td>{{$product->name}}</td>                    
                  <td>{{number_format($product->price, 2, ',', '.')}}</td>
                  <td>{{$product->categories->categoryName}}</td>
                  <td><a class="btn-floating  waves-effect waves-light orange"><i class="material-icons">mode_edit</i></a>
                    <a href="#delete-{{$product->id}}" class="btn-floating modal-trigger waves-effect waves-light red"><i class="material-icons">delete</i></a></td>
                    @include('admin/produtos/delete')
                </tr>
                @endforeach

                  
                </tbody>
              </table>
            </div> 

            <div class="row">
              <div class="center">{{$products->links('custom/pagination') }}
              </div>
          </div>        
    </div>
@endsection
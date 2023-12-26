<?php

namespace App\Http\Controllers;

use Darryldecode\Cart\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function listCart(){
        $itens = \Cart::getContent(); //Intelliphenses alerta falsamente
        return view('site.cart', compact('itens'));
    }
    
    public function addCart(Request $request){ 
        ///recebe do metodo post (nas rotas) o valor dos dados em "Request"...joga dentro da var $request...
        \Cart::add([
            'id' => $request->id,
            'name' => $request->name,
            'price' => $request->price,
            ///'id_ctegory'=> $request->id_category,
            'quantity' => abs($request->qty),
            'attributes' => array(
               'image' => $request->image
                )
        ]);
        $itens = \Cart::getContent(); //Intelliphenses alerta falsamente
        return redirect()->route('site/cart')->with('success', 'Product add on your cart!');
    }

    public function removeItemCart(Request $request){
        \Cart::remove($request->id);
        return redirect()->route('site/cart')->with('successRemove', 'Product removed from your cart!');
    }

    public function refreshCart(Request $request)  {
        \Cart::update($request->id, [
            'quantity' => [
                'relative' => false,
                'value' => abs($request->quantity)
            ]
            ]);
        return redirect()->route('site/cart')->with('successRefresh', 'Cart successfully refreshed!');
    }

    public function clearCart(){
        \Cart::clear();
        return redirect()->route('site/cart')->with('successClear', 'Your cart is clear');
    }
}

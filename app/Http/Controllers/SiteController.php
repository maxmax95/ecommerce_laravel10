<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Products;
use App\Models\Category;
use Illuminate\Support\Facades\Gate;

class SiteController extends Controller
{
    
    public function index() {
        
        ///recupera os products usando o model e pagina eles
        $products = Products::paginate(6);

        return view('site\home', compact('products'));
    } 
    
    public function details($slug)
    {
        $product = Products::where('slug', $slug)->first();

        Gate::authorize('see_product', $product);

        return view('site.details', compact('product'));
    }

    public function categories($id)
    { 
        $category = Category::find($id);
        $products = Products::where('id_category', $id)->paginate(6); ///sempre necessario usar get/paginate quando o metodo nao é xx::all()

        return view('site.categories', compact('products', 'category'));
    }
}

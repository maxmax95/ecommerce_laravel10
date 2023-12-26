<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;
use App\Models\Category;
use App\Models\Products;
use DB;

class DashboardController extends Controller
{
    public function index(){
        $usersCount = Users::all()->count();

        ///grafico 1
        $userData = Users::select([
            DB::raw('EXTRACT(Year from created_at) as ano'),
            DB::raw('count(*) as count')
            ///ignore o erro de DB
        ])
        ->groupBy('ano')
        ->orderBy('ano','asc')
        ->get();

        ///dd($userData);

        ///preparar arrays para grafico
        foreach ($userData as $data ) {
            $ano [] = $data->ano;
            $total [] = $data->count;
        }

        ///dd($total);
        ///formatar para chartjs

        $userLabel = "'Users Register History'";
        $userAno = implode(',', $ano);
        $userTotal = implode(',',$total);

        ///dd($userTotal);
        
        ///grafico 2 - categorias
        $catData = Category::with('products')->get();

        ///preparar array
        foreach ($catData as $data) {
            $nome[] = "'".$data->categoryName."'"; ///aspas simples para JS
            $total[] = $data->products->count();
            ///ou
            ///$total[] = Products::where('id_category', $data->id)->count();///produtos por categoria
        }

        $nomeCat = implode(',', $nome);
        $totalCat = implode(',',$total);

        ///dd($catData);

        return view('admin/dashboard',compact('usersCount', 'userLabel', 'userAno', 'userTotal', 'nomeCat', 'totalCat' ) );
    }

    
}

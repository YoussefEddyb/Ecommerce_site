<?php

namespace App\Http\Controllers;

use App\Categorie;
use App\Parametre;
use App\Produit;
use App\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SiteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $param=Parametre::find(1);
        $sliders=Slider::all();
        $categories=Categorie::all()->where('active',0);
        $produits=Produit::paginate(9);
        return view('frontend.index',['categories'=>$categories,'produits'=>$produits,'sliders'=>$sliders,'param'=>$param]);
    }
    public function inscription()
    {
        $param=Parametre::find(1);
        return view('frontend.inscription',['param'=>$param]);
    }

    public function panier()
    {
        $param=Parametre::find(1);
        return view('frontend.panier',['param'=>$param]);
    }

    public function search(Request $request)
    {
            $sliders=Slider::all();
            $param=Parametre::find(1);
            $categories=Categorie::all()->where('active',0);
            //par nom de produits;
            if ($request->has('search'))
            {
                $Search = $request->get('search');
                $produits = DB::table('produits')->where('nom_produit', 'like', '%' . $Search . '%')->paginate(9);
            }

        return view('frontend.index',['categories'=>$categories,'produits'=>$produits,'sliders'=>$sliders,'param'=>$param]);
    }
    public function filtre($id)
    {
        $sliders=Slider::all();
        $param=Parametre::find(1);
        $categories=Categorie::all()->where('active',0);
        $produits = DB::table('produits')->where('id_categorie', 'like', '%' . $id . '%')->paginate(9);
        return view('frontend.index',['categories'=>$categories,'produits'=>$produits,'sliders'=>$sliders,'param'=>$param]);
    }
}

<?php

namespace App\Http\Controllers;

use DB;
use App\Charts\ProduitChart;
use charts;

class ChartController extends Controller
{
    public function index(){
        $Prods = new ProduitChart;
        $pvendu1=DB::table('detail_commandes')
        ->join('produits','produits.id','=','detail_commandes.id_produit')
        ->select('produits.nom_produit')
        ->groupBy('produits.nom_produit')
        ->get();

        $pvendu2=DB::table('detail_commandes')
        ->join('produits','produits.id','=','detail_commandes.id_produit')
        ->select(DB::raw('COUNT(*) as cltotal'))
        ->groupBy('produits.nom_produit')
        ->get();

        $Prods->labels($pvendu1->pluck('nom_produit'));
        $Prods->dataset('les produits vendu', 'bar', $pvendu2->pluck('cltotal'))
                ->color("rgb(255, 99, 132)")
                ->backgroundcolor("rgb(255, 99, 120)");
        return view('backend.chart', [ 'prods' => $Prods ] );
    }
}

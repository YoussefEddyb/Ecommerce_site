<?php

namespace App\Http\Controllers;

use App\Categorie;
use App\Detail_commande;
use App\Fournisseur;
use App\Produit;
use Illuminate\Http\Request;
use Session;

class ProduitController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin')->only('destroy');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produits = Produit::all()->where('indisponsable',0);
        $categories = Categorie::all();
        $fournisseurs = Fournisseur::all();
        return view('backend.produit', [
                'Produits'=>$produits,
                'categories' => $categories,
                'fournisseurs' => $fournisseurs
        ]);
        // return view('backend.produit')->with('produits', $produits);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $produit=new Produit();
        $produit->nom_produit=$request->name;
        $produit->id_fournisseur=$request->category_id;
        $produit->id_categorie=$request->fourn_id;
        $produit->quantite_unite=$request->qteu;
        $produit->prix_unitaire=$request->prixunit;
        $produit->unites_stock=$request->unitS;
        $produit->unites_commandees=$request->untC;
        $produit->niveau_reapprovisionnement=$request->nivr;
        if($request->hasFile('photo'))
        {
            $produit->image=$request->photo->store('images/produits','public');
        }
        $produit->code_bar=$request->code_b;

        $produit->save();

        Session::flash('success', 'Produit enregistrer avec succès ');
        return redirect()->route('produit.index');

    }

    public function changeProduit(Request $request)
    {
        $prix_u=DB::table('produits')->select('produits.prix_unitaire')->where('produits.id','=',$request->id_prod)->get();
        return $prix_u;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Produit  $produit
     * @return \Illuminate\Http\Response
     */
    public function show(Produit $produit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Produit  $produit
     * @return \Illuminate\Http\Response
     */
    public function edit(Produit $produit)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Produit  $produit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Produit $produit)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Produit  $produit
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $detail = Detail_commande::where('id_produit', $id)->get();
        if (sizeof($detail) > 0) {
            Session::flash('warning', 'Ce produit ne peut pas être supprimé!');

            return redirect()->route('produit.index');
        } else {
            $produit = Produit::find($id);
            $produit->indisponsable = !$produit->indisponsable;
            $produit->save();
            Session::flash('info', 'Ce produit a été supprimé avec succès!');

            return redirect()->route('produit.index');
        }
    }
}

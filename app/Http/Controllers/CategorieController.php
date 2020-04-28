<?php

namespace App\Http\Controllers;

use App\Categorie;
use App\Produit;
use Illuminate\Http\Request;
use Session;

class CategorieController extends Controller
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
        $categories = Categorie::all()->where('active',0);

        return view('backend.categorie')->with('categories', $categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $categorie=new Categorie();
        $categorie->nom_categorie = $request->name;
        $categorie->description = $request->description;
        $categorie->illustration =$request->illustra;
        if($request->hasFile('icon'))
        {
            $categorie->icon=$request->icon->store('images/icon_cat','public');
        }

        $categorie->save();

        Session::flash('success', 'Catégorie enregistrer avec succès');
        return redirect()->route('categorie.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Categorie  $categorie
     * @return \Illuminate\Http\Response
     */
    public function show(Categorie $categorie)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Categorie  $categorie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //dd($request->input());
        $categorie=Categorie::find($request->id);
        $categorie->nom_categorie = $request->name;
        $categorie->description = $request->description;
        $categorie->illustration =$request->illustra;
        if($request->hasFile('icon'))
        {
            $categorie->icon=$request->icon->store('images/icon_cat','public');
        }

        $categorie->save();

        Session::flash('info', 'Cette catégorie a été modifiée avec succès!');
        return redirect()->route('categorie.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Categorie  $categorie
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $produit = Produit::where('id_categorie', $id)->get();
        if (sizeof($produit) > 0) {
            Session::flash('warning', 'Cette catégorie ne peut pas être supprimée!');

            return redirect()->route('categorie.index');
        } else {
            $categorie = Categorie::find($id);
            $categorie->active = !$categorie->active;
            $categorie->save();
            Session::flash('info', 'Cette catégorie a été supprimée avec succès!');

            return redirect()->route('categorie.index');
        }
    }
}

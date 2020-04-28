<?php

namespace App\Http\Controllers;

use App\Fournisseur;
use App\Produit;
use Illuminate\Http\Request;
use Session;
use Hash;

class FournisseurController extends Controller
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
        $fournisseurs = Fournisseur::all()->where('active',0);

        return view('backend.fournisseur')->with('fournisseurs', $fournisseurs);
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
        $forniss = new Fournisseur();
        $forniss->nom_fournisseur = $request->name;
        $forniss->prenom_fournisseur = $request->prenom;
        $forniss->societe = $request->societe;
        $forniss->contact = $request->contact;
        $forniss->adresse = $request->adresse;
        $forniss->fonction = $request->fonction;
        $forniss->ville = $request->city;
        $forniss->region = $request->reg_id;
        $forniss->code_postal = $request->codepost;
        $forniss->pays = $request->country_id;
        $forniss->telephone = $request->tel;
        $forniss->fax = $request->fax;
        $forniss->email = $request->email;
        $forniss->password =hash::make($request->password);
        if($request->hasFile('photo'))
        {
            $forniss->photo=$request->photo->store('images/fournisseur','public');
        }
        $forniss->code_bar = $request->codeb;
        $forniss->save();

        Session::flash('success', 'Fournisseur enregistrer avec succès ');
        return redirect()->route('fournisseur.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Fournisseur  $fournisseur
     * @return \Illuminate\Http\Response
     */
    public function show(Fournisseur $fournisseur)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Fournisseur  $fournisseur
     * @return \Illuminate\Http\Response
     */
    public function edit(Fournisseur $fournisseur)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Fournisseur  $fournisseur
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Fournisseur $fournisseur)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Fournisseur  $fournisseur
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $produit = Produit::where('id_fournisseur', $id)->get();
        if (sizeof($produit) > 0) {
            Session::flash('warning', 'Ce fouenisseur ne peut pas être bloqué!');

            return redirect()->route('fournisseur.index');
        } else {
            $fournisseur = Fournisseur::find($id);
            $fournisseur->active = !$fournisseur->active;
            $fournisseur->save();
            Session::flash('info', 'Ce fournisseur a été bloqué avec succès!');

            return redirect()->route('fournisseur.index');
        }
    }
}

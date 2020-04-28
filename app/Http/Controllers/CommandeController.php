<?php

namespace App\Http\Controllers;

use App\Commande;
use App\Client;
use App\Detail_commande;
use App\Messager;
use App\Produit;
use Illuminate\Http\Request;
use Session;
use Auth;

class CommandeController extends Controller
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
        $commandes = Commande::all()->where('active',0);
        $clients = Client::all();
        $messagers = Messager::all();
        return view('backend.commande', [
                'commandes'=>$commandes,
                'clients' => $clients,
                'messagers' => $messagers
        ]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->input());
        $commande = new Commande();
        $commande->id_client = $request->client_id;
        $commande->id_employe = Auth::user()->id;
        $commande->id_messager = $request->messager_id;
        $commande->date_commande = date("Y-m-d");
        $commande->livrer_avant = $request->dateliv;
        $commande->date_envoi = $request->date_envoi;
        $commande->adresse_livraison = $request->adresse;
        $commande->ville_livraison = $request->city;
        $commande->region_livraison = $request->reg_id;
        $commande->code_postal_livraison = $request->codepost;
        $commande->pays_livraison = $request->country_id;
        $commande->port = $request->port;
        $commande->destinataire = $request->destinataire;

        $commande->save();
        $idcom=$commande->id;
        $produits=Produit::all();

        Session::flash('success', 'Commande enregistrer avec succès');
        return redirect()->route('commande.detail',['idcom'=>$idcom,'produits'=>$produits]);
    }

    public function showDetail_d($idcom)
    {
        $produits=Produit::all();
        $commande=Commande::find($idcom);
        $details=Detail_commande::where('id_commande','=',$commande->id)->get();
        return view('backend.detail',['details'=>$details,'commande'=>$commande,'produits'=>$produits]);
    }

    public function showDetail($idcom)
    {
        $commande=Commande::find($idcom);
        $details=Detail_commande::where('id_commande','=',$commande->id)->get();
        return view('backend.detailcom',['details'=>$details,'commande'=>$commande]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Commande  $commande
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Commande $commande)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Commande  $commande
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $detail = Detail_commande::where('id_commande', $id)->get();
        if (sizeof($detail) > 0) {
            Session::flash('warning', 'Ce commande ne peut pas être supprimé!');

            return redirect()->route('commande.index');
        } else {
            $commande = Commande::find($id);
            $commande->active = !$commande->active;
            $commande->save();
            Session::flash('info', 'Ce commande a été supprimé avec succès!');

            return redirect()->route('commande.index');
        }
    }
}

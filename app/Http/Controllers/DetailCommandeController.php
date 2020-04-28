<?php

namespace App\Http\Controllers;

use App\Commande;
use App\Detail_commande;
use App\Produit;
use Illuminate\Http\Request;
use PDF;
use Session;

class DetailCommandeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lists = Detail_commande::all();

        return $lists;
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
        //dd($request->input());
        // $details = new Detail_commande();
        // $details->id_commande = $request->idcom;
        // $details->id_produit = $request->produit_id;
        // $details->prix_unitaire = $request->prixu;
        // $details->quantite = $request->qte;
        // $details->remise = $request->remise;
        // $details->save();
        // return $this->index();

        $id_produit=$request->product;
        $prix_unitaire=$request->price;
        $quantite=$request->qty;
        $remise=$request->remise;
        for($i = 0; $i < count($id_produit); $i++){
            $detcom = new Detail_commande();
            $detcom->id_commande=$request->id;
            $detcom->id_produit=$id_produit[$i];
            $detcom->prix_unitaire=$prix_unitaire[$i];
            $detcom->quantite=$quantite[$i];
            $detcom->remise=$remise[$i];
            $detcom->save();
        }

        $com=Commande::find($request->id);
        //$prod = Produit::all();
        $detail = Detail_commande::where('id_commande','=',$request->id)->get();
        //$info = array($prod,$com->id,$com->date_commande,$com->destinataire,$prod->count(),$com->date_commande,$detprod);

        //$pdf = PDF::loadView('backend.facture',['commande' => $com,'detailcom'=>$detail]);

        $pdf = PDF::loadView('backend.facture', compact('com','detail'));
        //return $pdf->download('facture.pdf');

        return $pdf->stream(date('Y', strtotime($com->date_commande)).'.pdf');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Detail_commande  $detail_commande
     * @return \Illuminate\Http\Response
     */
    public function show(Detail_commande $detail_commande)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Detail_commande  $detail_commande
     * @return \Illuminate\Http\Response
     */
    public function edit(Detail_commande $detail_commande)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Detail_commande  $detail_commande
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Detail_commande $detail_commande)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Detail_commande  $detail_commande
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $detail = Detail_commande::find($id);
        $detail->delete();
    }
}

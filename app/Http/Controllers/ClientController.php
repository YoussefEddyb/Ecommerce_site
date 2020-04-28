<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Client;
use App\Categorie;
use App\Parametre;
use App\Produit;
use Illuminate\Http\Request;
use Session;
use Hash;
use Illuminate\Support\Facades\Auth;
use App\Cart;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
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

        $client = new Client();
        $client->nom_client = $request->lastname;
        $client->prenom_client = $request->firstname;
        $client->societe = $request->company;
        $client->contact = $request->address;
        $client->fonction = $request->fonction;
        $client->ville = $request->city;
        $client->region = $request->zone_id;
        $client->code_postal = $request->postcode;
        $client->pays = $request->country_id;
        $client->telephone = $request->telephone;
        $client->fax = $request->fax;
        $client->email = $request->email;
        $client->password =hash::make($request->password);
        if($request->hasFile('photo'))
        {
            $client->photo=$request->photo->store('images/client','public');
        }

        $client->save();

        Session::flash('success', 'Bienvenue !!!!! ');
        return redirect()->route('site.connexion');
    }

    public function changeClient(Request $request)
    {
        $adresse=DB::table('clients')->select('clients.contact')->where('clients.id','=',$request->id_client)->get();
        return $adresse;
    }

    public function profile()
    {
        $param=Parametre::find(1);
        $client=Client::find(Auth::guard('client')->user()->id);
        //dd($client);
        return view('frontend.profile',['client'=>$client,'param'=>$param]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
            //dd($request->input());
            $client =Client::find($request->id);
            $client->prenom_client=$request->firstname;
            $client->nom_client=$request->lastname;
            $client->societe=$request->company;
            $client->contact=$request->address;
            $client->fonction=$request->fonction;
            $client->ville = $request->city;
            $client->region = $request->zone_id;
            $client->code_postal = $request->postcode;
            $client->pays = $request->country_id;
            $client->telephone = $request->telephone;
            $client->fax = $request->fax;
            $client->email = $request->email;
            $client->password =hash::make($request->new_password);
            if($request->hasFile('photo'))
            {
                $client->photo=$request->photo->store('images/client','public');
            }

            $client->save();

            Session::flash('info', 'Ce client a été modifiée avec succès!');
            return redirect()->route('client.profile');
    }

    public function addToCart(Produit $product) {

        if (session()->has('cart')) {
            $cart = new Cart(session()->get('cart'));
        } else {
            $cart = new Cart();
        }
        $cart->add($product);
        session()->put('cart', $cart);
        return redirect()->route('site.index')->with('success', 'Produit ajouté au panier avec succès');
    }

    public function panier() {
        if (session()->has('cart')) {
            $cart = new Cart(session()->get('cart'));
        } else {
            $cart = null;
        }

        $param=Parametre::find(1);
        return view('frontend.panier',compact('cart','param'));

        //return view('cart.show', compact('cart'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        //
    }
}

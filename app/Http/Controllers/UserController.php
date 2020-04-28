<?php

namespace App\Http\Controllers;

use App\User;
use App\Commande;
use Illuminate\Http\Request;
use Session;
use Hash;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin')->only(['destroy', 'store', 'changePermission']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = user::all()->where('active',0);

        return view('backend.user')->with('users', $users);
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = new User();
        $user->nom_employe = $request->name;
        $user->prenom_employe = $request->prenom;
        $user->titre_courtoisie = $request->titreC;
        $user->date_naissance = $request->datenais;
        $user->date_embauche = $request->dateemb;
        $user->adresse = $request->adresse;
        $user->fonction = $request->fonction;
        $user->ville = $request->city;
        $user->region = $request->reg_id;
        $user->code_postal = $request->codepost;
        $user->pays = $request->country_id;
        $user->tel_domicile = $request->tel;
        $user->extension = $request->extension;
        $user->email = $request->email;
        $user->password =hash::make($request->password);
        if($request->hasFile('photo'))
        {
            $user->photo=$request->photo->store('images/employees','public');
        }
        $user->notes = $request->notes;
        $user->rend_compte = $request->rcompte;
        $user->code_bar = $request->codeb;
        $user->save();

        Session::flash('success', 'Employé enregistrer avec succès ');
        return redirect()->route('user.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);

        return view('backend.profile', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $commande = Commande::where('id_employe', $id)->get();
        if (sizeof($commande) > 0) {
            Session::flash('warning', 'Ce employé ne peut pas être bloqué!');

            return redirect()->route('user.index');
        } else {
            $user = User::find($id);
            $user->active = !$user->active;
            $user->save();
            Session::flash('info', 'Ce employé a été bloqué avec succès!');

            return redirect()->route('user.index');
        }
    }

    public function changePermission($id)
    {
        $user = User::find($id);

        $user->admin = !$user->admin;
        $user->save();

        Session::flash('success', 'Permission a été changé avec succès!');

        return redirect()->route('user.index');
    }
}

<?php

namespace App\Http\Controllers;

use App\Commande;
use App\Messager;
use Illuminate\Http\Request;
use Session;

class MessagerController extends Controller
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
        $messagers = Messager::all()->where('active',0);

        return view('backend.messager')->with('messagers', $messagers);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $messager=new Messager();
        $messager->nom_message = $request->name;
        $messager->telephone = $request->tel;

        $messager->save();

        Session::flash('success', 'Messager enregistrer avec succès');
        return redirect()->route('messager.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Messager  $messager
     * @return \Illuminate\Http\Response
     */
    public function show(Messager $messager)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Messager  $messager
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //dd($request->input());
        $messager = Messager::find($request->id);
        $messager->nom_message = $request->name;
        $messager->telephone = $request->tel;
        $messager->save();
        Session::flash('info', 'Ce messager a été modifié avec succès!');

        return redirect()->route('messager.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Messager  $messager
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $commande = Commande::where('id_messager', $id)->get();
        if (sizeof($commande) > 0) {
            Session::flash('warning', 'Ce messager ne peut pas être bloqué!');

            return redirect()->route('messager.index');
        } else {
            $messager = Messager::find($id);
            $messager->active = !$messager->active;
            $messager->save();
            Session::flash('info', 'Ce messager a été bloqué avec succès!');

            return redirect()->route('messager.index');
        }
    }
}

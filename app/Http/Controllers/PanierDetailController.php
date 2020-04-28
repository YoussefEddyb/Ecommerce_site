<?php

namespace App\Http\Controllers;

use App\Panier_detail;
use Illuminate\Http\Request;

class PanierDetailController extends Controller
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
        //
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Panier_detail  $panier_detail
     * @return \Illuminate\Http\Response
     */
    public function show(Panier_detail $panier_detail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Panier_detail  $panier_detail
     * @return \Illuminate\Http\Response
     */
    public function edit(Panier_detail $panier_detail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Panier_detail  $panier_detail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Panier_detail $panier_detail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Panier_detail  $panier_detail
     * @return \Illuminate\Http\Response
     */
    public function destroy(Panier_detail $panier_detail)
    {
        //
    }
}

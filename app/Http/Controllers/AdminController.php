<?php

namespace App\Http\Controllers;

use App\Parametre;
use App\Slider;
use Illuminate\Http\Request;
use Session;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;


class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $chart_options = [
            'chart_title' => 'Nouveau Utilisateur par Mois',
            'report_type' => 'group_by_date',
            'model' => 'App\Client',
            'group_by_field' => 'created_at',
            'group_by_period' => 'month',
            'chart_type' => 'bar',
        ];

        $chart1 = new LaravelChart($chart_options);

        $chart_options = [
            'chart_title' => 'Produits plus vendu',
            'chart_type' => 'pie',
            'report_type' => 'group_by_string',
            'model' => 'App\Produit',
            'group_by_field' => 'id',
            'aggregate_function' => 'sum',
            'aggregate_field' => 'unites_commandees',
            'group_by_period' => 'month',
        ];


        $chart2 = new LaravelChart($chart_options);

        $chart_options = [
            'chart_title' => 'Commandes par mois',
            'report_type' => 'group_by_date',
            'model' => 'App\Commande',
            'group_by_field' => 'created_at',
            'group_by_period' => 'month',
            'chart_type' => 'line',
        ];

        $chart3 = new LaravelChart($chart_options);

        return view('backend.index',compact('chart1', 'chart2', 'chart3'));
    }
    public function slider()
    {
        $sliders=Slider::all();
        return view('backend.sliders',['sliders'=>$sliders]);
    }

    public function store(Request $request)
    {
        $slider=new Slider();
        if($request->hasFile('image'))
        {
            $slider->image=$request->image->store('images/slider','public');
        }

        $slider->save();

        Session::flash('success', 'slider enregistrer avec succès');
        return redirect()->route('admin.slider');

    }

    public function destroy($id)
    {
        $slider = Slider::find($id);
        $slider->delete();
        Session::flash('info', 'Ce slider a été supprimée avec succès!');

        return redirect()->route('admin.slider');
    }

    public function config()
    {
        $config=Parametre::find(1);
        return view('backend.config',['config'=>$config]);
    }

    public function update(Request $request)
    {
        $param=Parametre::find($request->id);
        $param->email = $request->email;
        $param->description = $request->desc;
        $param->adresse =$request->adresse;
        $param->telephone =$request->tel;
        $param->fax =$request->faxe;
        if($request->hasFile('logo'))
        {
            $param->logo=$request->logo->store('images/logos','public');
        }

        if($request->hasFile('image'))
        {
            $param->banner_pub=$request->image->store('images/pub','public');
        }
        $param->save();

        Session::flash('info', 'Ce paramétre a été modifiée avec succès!');
        return redirect()->route('admin.contact');

    }


}

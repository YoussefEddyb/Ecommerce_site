<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categorie;
use App\Produit;
use App\Imports\ImportProduits;
use App\Imports\ImportCategories;
use App\Exports\ExportCategories;
use App\Exports\ExportProduits;
use Maatwebsite\Excel\Facades\Excel;

class ImportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produits = Produit::orderBy('id','DESC')->get();
        return view('backend.importP')->with('produits', $produits);
    }

    public function indexC()
    {
        $categories = Categorie::orderBy('id','DESC')->get();
        return view('backend.import')->with('categories', $categories);
    }

    public function export()
    {
        return Excel::download(new ExportCategories, 'categories.xlsx');
    }

    public function exportP()
    {
        return Excel::download(new ExportProduits, 'produits.xlsx');
    }

    public function import(Request $request)
    {
        $request->validate([
            'import_file' => 'required|mimes:xlsx'
        ]);
        Excel::import(new ImportCategories, request()->file('import_file'));
        return back()->with('success', 'Category imported successfully.');
    }

    public function importP(Request $request)
    {
        $request->validate([
            'import_file' => 'required|mimes:xlsx'
        ]);
        Excel::import(new ImportProduits, request()->file('import_file'));
        return back()->with('success', 'Product imported successfully.');
    }

}

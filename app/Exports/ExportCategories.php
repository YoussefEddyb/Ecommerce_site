<?php

namespace App\Exports;

use App\Categorie;
use Maatwebsite\Excel\Concerns\FromCollection;

class ExportCategories implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Categorie::all();
    }
}

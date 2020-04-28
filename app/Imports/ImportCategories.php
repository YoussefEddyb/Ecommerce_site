<?php

namespace App\Imports;

use App\Categorie;
use Maatwebsite\Excel\Concerns\ToModel;

class ImportCategories implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Categorie([
            'nom_categorie' => $row[0],
            'description' => $row[1],
            'illustration' => $row[2],
            'icon' => $row[3],
        ]);
    }
}

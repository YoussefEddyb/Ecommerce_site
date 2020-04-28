<?php

namespace App\Imports;

use App\Produit;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;

class ImportProduits implements ToModel,WithBatchInserts,WithChunkReading
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        //dd($row);
        return new Produit([
            'nom_produit'                   => $row[0],
            'id_fournisseur'                => $row[1],
            'id_categorie'                  => $row[2],
            'quantite_unite'                => $row[3],
            'prix_unitaire'                 => $row[4],
            'unites_stock'                  => $row[5],
            'unites_commandees'              =>$row[6],
            'niveau_reapprovisionnement'    => $row[7],
            'image'                         => $row[8],
            'code_bar'                      => $row[9]
        ]);
    }
    public function chunkSize(): int
    {
        return 1000;
    }

    public function batchSize(): int
    {
        return 1000;
    }
}

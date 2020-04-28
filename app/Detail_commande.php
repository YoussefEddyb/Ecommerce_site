<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detail_commande extends Model
{
    public function produit() {
        return $this->belongsTo('App\Produit', 'id_produit');
    }
}

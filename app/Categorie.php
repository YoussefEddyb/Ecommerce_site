<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    public $fillable = ['nom_categorie','description','illustration','icon'];
    
    public function produits() {
        return $this->hasMany('App\Produit');
    }
}

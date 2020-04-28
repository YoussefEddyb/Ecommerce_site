<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{

    public $fillable = ['nom_produit','id_fournisseur','id_categorie','quantite_unite','prix_unitaire','unites_stock','unites_commandees','niveau_reapprovisionnement','image','code_bar'];
    public function category() {
        return $this->belongsTo('App\Categorie', 'id_categorie');
    }
    public function fournisseur() {
        return $this->belongsTo('App\Fournisseur', 'id_fournisseur');
    }
}

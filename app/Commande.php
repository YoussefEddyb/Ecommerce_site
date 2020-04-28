<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    protected $fillable = ['id_client', 'id_employe', 'id_messager','date_commande','livrer_avant','date_envoi','port','destinataire','adresse_livraison','ville_livraison','region_livraison','code_postal_livraison','pays_livraison'];

    public function client() {
        return $this->belongsTo('App\Client', 'id_client');
    }
    public function messager() {
        return $this->belongsTo('App\Messager','id_messager');
    }

    public function user() {
        return $this->belongsTo('App\User','id_employe');
    }
}

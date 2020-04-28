<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Messager extends Model
{
    public function commandes() {
        return $this->hasMany('App\Commande');
    }
}

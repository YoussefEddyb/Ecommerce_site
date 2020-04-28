<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Parametre extends Model
{
    public $fillable = ['id','logo','adresse','email','telephone','fax','description','banner_pub'];
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Panier extends Model
{
    protected $fillable = ['client_id','plat_id','quantite'];
}

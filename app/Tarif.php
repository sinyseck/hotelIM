<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tarif extends Model
{
    protected $fillable = ['prix','nbre_personne'];

    public function tarifs(){
        return $this->hasMany(Tarif::class);
    }

}

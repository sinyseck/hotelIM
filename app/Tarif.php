<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tarif extends Model
{
    protected $fillable = ['prix','nbre_personne','hotel_id'];

    public function tarifs(){
        return $this->hasMany(Tarif::class);
    }
    public function  hotel(){
        return $this->belongsTo(Hotel::class);
    }

}

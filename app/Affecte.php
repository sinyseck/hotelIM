<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Affecte extends Model
{
    protected $fillable = ['reservation_id','chambre_id'];

    public function reserver(){
        return $this->belongsTo(Reservation::class);
    }
    public function chambre(){
        return $this->belongsTo(Chambre::class);
    }
}

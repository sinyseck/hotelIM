<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paiement extends Model
{
    protected $fillable = ['montant','commande_id','reservation_id','hotel_id'];

    public function commande(){
        return $this->belongsTo(Commande::class);
    }
    public  function reservation(){
        return $this->belongsTo(Reservation::class);
    }
    public function hotel(){
        return $this->belongsTo(Hotel::class);
    }
}

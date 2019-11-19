<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paiement extends Model
{
    protected $fillable = ['montant','commande_id'];

    public function commande(){
        return $this->belongsTo(Commande::class);
    }
}

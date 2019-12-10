<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailCommande extends Model
{
    protected $fillable= ['quantite','plat_id','commande_id'];

    public function plat(){
        return $this->belongsTo(Plat::class);
    }
    public function commande(){
        return $this->belongsTo(Commande::class);
    }
}

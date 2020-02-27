<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    protected $fillable = ['nom','logo','adresse','telephone','email'];

    public function users(){
        return $this->belongsTo(User::class);
    }
    public function chambres(){
        return $this->hasMany(Chambre::class);
    }
    public function tarifs(){
        return $this->hasMany(Tarif::class);
    }
    public function produits(){
        return $this->hasMany(Produit::class);
    }
    public function commandes(){
        return $this->hasMany(Commande::class);
    }

}

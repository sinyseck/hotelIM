<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Restoproduit extends Model
{
    protected $table= 'restoproduits';
    protected $fillable= ['produit_id','restaurant_id'];

    public function restaurant(){
        return $this->belongsTo(Restaurant::class, 'restaurant_id');
    }
    public function produits(){
        return $this->belongsTo(Produit::class, 'produit_id');
    }
}

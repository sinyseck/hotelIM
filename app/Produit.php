<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    protected $table='produits';
    protected $fillable= ['nom','quantite','pu','hotel_id'];

    public function entreeStock()
    {
        return $this->hasMany(EntreeStock::class, 'id_produit', 'id');
    }

     public function plats(){
        return $this->belongsToMany(Plat::class);
     }
    public function  plat_produits(){
        return $this->hasMany(Compose::class);
    }
    public function hotels()
    {
        return $this->belongsTo(Hotel::class);
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    protected $table='produits';
    protected $fillable= ['nom','quantite','pu'];

    public function entreeStock()
    {
        return $this->hasMany(EntreeStock::class, 'id_produit', 'id');
    }

    public function composes(){
        return $this->hasMany(Compose::class);
     }

    /* public function plats(){
        return $this->belongsToMany(Plat::class);
     }*/

}

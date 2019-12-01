<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Compose extends Model
{
    protected $table= 'composes';
    protected $fillable= ['produit_id','plat_id'];


    public function plat(){
        return $this->belongsTo(Plat::class, 'plat_id');
    }
    public function produits(){
        return $this->belongsTo(Produit::class, 'produit_id');
    }
}

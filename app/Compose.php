<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Compose extends Model
{
    protected $table= 'plat_produit';
    protected $fillable= ['produit_id','plat_id'];



    public function produit(){
        return $this->belongsTo(Produit::class);
    }
    public function plat(){
        return $this->belongsTo(Plat::class);
    }
}

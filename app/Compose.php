<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Compose extends Model
{
    protected $table= 'composes';
    protected $fillable= ['produit_id','plat_id'];


    public function plat(){
        return $this->belongsTo(Plat::class);
    }
    public function produit(){
        return $this->belongsTo(Produit::class);
    }
}

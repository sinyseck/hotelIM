<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plat extends Model
{
   protected $table = 'plats';
   protected $fillable = ['nom','prix','quantite','commande_id'];

   public function composes(){
    return $this->hasMany(Compose::class, 'plat_id', 'id');
    }

    public function client()
    {
        return $this->belongsTo(Client::class);
    }
    public function table()
    {
        return $this->belongsTo(Table::class, 'id_table');
    }

    public function commande()
    {
        return $this->belongsToMany(Commande::class, 'commande_id');
    }

    /*public function produits(){
        return $this->belongsToMany(Produit::class);
     }*/
}
<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EntreeStock extends Model
{
    protected $table='entreeStocks';
    protected $fillable= ['date','quantite','id_produit'];

    public function produit()
    {
        return $this->belongsTo(Produit::class, 'id_produit');
    }


}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    protected $table='commandes';
    protected $fillable= ['client_id','table_id'];

    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id');
    }
    public function table()
    {
        return $this->belongsTo(Table::class, 'table_id');
    }
    public function paiements(){
        return $this->hasMany(Paiement::class);
    }
    public function plat()
    {
        return $this->belongsToMany(Plat::class, 'commande_id', 'id');
    }


}

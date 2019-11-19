<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    protected $table='commandes';
    protected $fillable= ['id_client','id_table'];

    public function client()
    {
        return $this->belongsTo(Client::class, 'id_client');
    }
    public function table()
    {
        return $this->belongsTo(Table::class, 'id_table');
    }
    public function paiements(){
        return $this->hasMany(Paiement::class);
    }


}

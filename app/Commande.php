<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    protected $table='commandes';
    protected $fillable= ['client_id','table_id','hotel_id'];

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
        return $this->hasMany(Plat::class);
    }
    public function detailCommandes(){
        return $this->hasMany(DetailCommande::class);
    }
    public function hotel()
    {
        return $this->belongsTo(Hotel::class);
    }



}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $table = 'clients';
    protected $fillable = ['nom','prenom','nationalite','typePiece','numeroPiece','adresse','telephone','email','hotel_id'];

    public function reservations()
    {
        return $this->hasMany(Reservation::class);

    }
    public function commande()
    {
        return $this->hasMany(Commande::class, 'client_id', 'id');

    }
    public function plat()
    {
        return $this->hasMany(Plat::class, 'client_id', 'id');

    }
}

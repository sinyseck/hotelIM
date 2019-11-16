<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $table = 'clients';
    protected $fillable = ['nom','prenom','nationalite','typePiece','numeroPiece','adresse','telephone','email'];

    public function commande()
    {
        return $this->hasMany(Commande::class, 'id_client', 'id');
    }
}

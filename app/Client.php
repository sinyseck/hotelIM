<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = ['nom','prenom','nationalite','typePiece','numeroPiece','adresse','telephone','email'];

}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    protected $fillable = ['nom','logo','adresse','telephone','email'];

    public function users(){
        return $this->belongsTo(User::class);
    }
    public function chambres(){
        return $this->hasMany(Chambre::class);
    }
}

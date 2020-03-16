<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chambre extends Model
{
    protected $fillable = ['numero','hotel_id'];

    public function hotel(){
        return $this->hasMany(Hotel::class);
    }
    public function reservation_chambres(){
        return $this->hasMany(Affecte::class);
    }
    public function reservations(){
        return $this->belongsToMany(Reservation::class);
    }

}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chambre extends Model
{
    protected $fillable = ['numero','hotel_id'];

    public function hotel(){
        return $this->hasMany(Hotel::class);
    }
}

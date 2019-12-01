<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    protected $table = 'restaurants';
   protected $fillable = ['id_client','id_table','nom','prix','quantite'];

   public function composes(){
    return $this->hasMany(Compose::class, 'restaurant_id', 'id');
    }

}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Table extends Model
{
    protected $table = 'tables';
    protected $fillable = ['numero'];

    public function commande()
    {
        return $this->hasMany(Commande::class, 'table_id', 'id');
    }

    public function plat()
    {
        return $this->hasMany(Plat::class, 'table_id', 'id');
    }
}

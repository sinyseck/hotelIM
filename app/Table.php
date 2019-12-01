<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Table extends Model
{
    protected $table = 'tables';
    protected $fillable = ['numero'];

    public function commande()
    {
        return $this->hasMany(Commande::class, 'id_table', 'id');
    }

    public function plat()
    {
        return $this->hasMany(Plat::class, 'id_table', 'id');
    }
}

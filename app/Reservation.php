<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User;

class Reservation extends Model
{
    protected $fillable= ['date_arrivee','date_depart','nbre_personne','statut','etat_paiement',
                'client_id','id_user','tarif_id'];

  /*  public function affectes(){
        return $this->hasMany(Affecte::class);
    }*/
    public function client(){
        return $this->belongsTo(Client::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function tarif(){
        return $this->belongsTo(Tarif::class);
    }
    public function paiement(){
        return $this->belongsTo(Paiement::class);
    }
    public function chambres(){
        return $this->belongsToMany(Chambre::class);
    }
    public function reservation_chambres(){
        return $this->hasMany(Affecte::class);
    }


}

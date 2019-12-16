<?php

namespace App\Http\Controllers;

use App\Commande;
use App\Paiement;
use App\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PaiementController extends Controller
{

    public function __construct(){

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function validerPaiement($id){
        $reservation = Reservation::with(['affectes','affectes.chambre','client','tarif'])
            ->where('id',$id)
            ->first();
        // partie Restaurant
        $paiement = new Paiement();

        $totalRestaurant =0;
        $commandes = Commande::with(['detailCommandes','detailCommandes.plat'])
            ->whereBetween('created_at',[$reservation->date_arrivee,$reservation->date_depart])
            ->where('client_id',$reservation->client_id)
            ->get();
        foreach($commandes as $commande){
            foreach($commande->detailCommandes as $detailCommande){
                $totalRestaurant = $totalRestaurant + ($detailCommande->plat->prix *$detailCommande->quantite);
            }
        }
        $tvaRestaurant = ($totalRestaurant * 10)/100;
        //$totalRestaurantTTC = $tvaRestaurant +$totalRestaurant;
        //dd($commande);

        //partie hotel
        $jour = $this->dateDifference($reservation->date_arrivee,$reservation->date_depart);
        $montantNuite =$reservation->tarif->prix*$jour * count($reservation->affectes);
        $taxeSejour = 1000 * $jour;
        $tvaHotel = ($montantNuite* 10)/100;
        // $montantNuiteTTC = $montantNuite + $taxeSejour +$tvaHotel;
        $user = $user = DB::table('users')->find(Auth::id());
        $hotel = DB::table('hotels')->find($user->id_hotel);
        $paiement->montant = $montantNuite + $tvaHotel +$totalRestaurant + $totalRestaurant + $taxeSejour;
        $paiement->reservation_id = $id;
        $paiement->save();
        $reservation->etat_paiement = true;
        $reservation->save();
        return view('reservations.facture',
            compact('reservation','montantNuite','hotel','jour','commandes','taxeSejour','tvaHotel',
                'tvaRestaurant','totalRestaurant'));
    }
    public function dateDifference($date_1 , $date_2 , $differenceFormat = '%d' )
    {
        $datetime1 = date_create($date_1);
        $datetime2 = date_create($date_2);

        $interval = date_diff($datetime1, $datetime2);

        return $interval->format($differenceFormat);

    }
    public function validerPaiementCommande($id){
     //   $commande = C
    }
}

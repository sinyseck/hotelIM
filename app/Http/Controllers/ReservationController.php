<?php

namespace App\Http\Controllers;

use App\Affecte;
use App\Chambre;
use App\Client;
use App\Commande;
use App\Reservation;
use App\Tarif;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


use Calendar;
use Illuminate\Support\Facades\DB;

class ReservationController extends Controller
{
    public function __construct(){
        $this->middleware(['caissier', 'caissier'])->except( 'show');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = [];
        //$reservations= Reservation::all();
        //$reservations = Reservation::has('affectes.chambres')->get();
        $reservations = Reservation::with(['client','affectes','affectes.chambre'])->orderBy('id','desc')->get();
        /*foreach($reservers as $reserver){
            foreach($reserver->affectes as $affecte){
                $events[] = Calendar::event(

                    $affecte->chambre->numero,

                    true,

                    new \DateTime($reserver->date_arrivee),

                    new \DateTime($reserver->date_depart.' +1 day')

                );
            }


        }
        $calendar = Calendar::addEvents($events);*/
       // dd($reservations);
        return view ('reservations.index', compact('reservations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clients= Client::all();
        $tarifs= Tarif::all();
        $chambres = Chambre::all();
        return view('reservations.add', compact('clients','chambres','tarifs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        request()->validate([
            'date_arrivee' => 'required',
            'date_depart' => 'required',
            'nbre_personne' => 'required',
             'statut' => 'required' ,
            'etat_paiement' => 'required',
            'client_id' => 'required',
            'tarif_id' => 'required',
            'chambres' => 'required'
        ]);
        if( $request['date_arrivee'] >= $request['date_depart']){
            return redirect()->route('reservations.create')->with('error', 'Verifier le date de départ et le date arivée');
        }
        $request->merge(['id_user'=> Auth::id()]);
        $chambres = $request['chambres'];
        foreach ($chambres as $chambre) {
            $reservations = DB::table('reservations')
                ->join('affectes', 'reservations.id', '=', 'affectes.reservation_id')
                ->join('chambres', 'affectes.chambre_id', '=', 'chambres.id')
                ->select('affectes.*', 'reservations.*', 'chambres.*')
                ->where([['reservations.date_depart', '>', $request['date_arrivee']],
                    ['affectes.chambre_id', '=',$chambre]])
             ->first();
           // dd($reservations);
            if($reservations!=null){
                return redirect()->route('reservations.create')->with('error', 'Chambre '.$chambre.' déjà occupé');
            }
        }
        $reservaion = Reservation::create($request->all());
        //$role->save();
        //Looping thru selected permissions
        foreach ($chambres as $chambre) {
         $affecte = new Affecte();
            $affecte->chambre_id = $chambre;
            $affecte->reservation_id = $reservaion->id;
            $affecte->save();
        }

        return redirect()->route('reservations.index')->with('success', 'reservation enregistré avec succès');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $reservation = Reservation::with(['affectes','affectes.chambre','client'])
        ->where('id',$id)
        ->first();
        return view('reservations.show', compact('reservation'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $clients= Client::all();
        $tarifs= Tarif::all();
        $chambres = Chambre::all();
        $reservation = Reservation::findOrFail($id);
        return view('reservations.edit', compact('reservation','clients','tarifs','chambres'));
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
        request()->validate([
            'date_arrivee' => 'required',
            'date_depart' => 'required',
            'nbre_personne' => 'required',
            'statut' => 'required' ,
            'etat_paiement' => 'required',
            'id_client' => 'required',
            'tarif_id' => 'required',
            'chambres' => 'required'
        ]);
        $request->merge(['id_user'=> Auth::id()]);
        Reservation::find($id)->update($request->all());
        return redirect()->route('reservations.index')->with('success', 'Modification effectuée avec succès!!!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Reservation::find($id)->delete();
        return redirect()->route('reservations.index')->with('success', 'tarif supprimé avec succès');

    }
    public function caliendrier(){

        $reservations = Reservation::with(['client','affectes','affectes.chambre'])->orderBy('id','desc')->get();
        /*foreach($reservers as $reserver){
            foreach($reserver->affectes as $affecte){
                $events[] = Calendar::event(

                    $affecte->chambre->numero,

                    true,

                    new \DateTime($reserver->date_arrivee),

                    new \DateTime($reserver->date_depart.' +1 day')

                );
            }


        }
        $calendar = Calendar::addEvents($events);*/
        // dd($reservations);
        return view ('reservations.caliendrier', compact('reservations'));
    }

    public function dateDifference($date_1 , $date_2 , $differenceFormat = '%d' )
    {
        $datetime1 = date_create($date_1);
        $datetime2 = date_create($date_2);

        $interval = date_diff($datetime1, $datetime2);

        return $interval->format($differenceFormat);

    }

    public function facturerReservartion($id){

        $reservation = Reservation::with(['affectes','affectes.chambre','client','tarif'])
            ->where('id',$id)
            ->first();
        // partie Restaurant
        $totalRestaurant =0;
        $commandes = Commande::with(['plat'])
            ->whereBetween('created_at',[$reservation->date_arrivee,$reservation->date_depart])
            ->get();
        foreach($commandes as $commande){
            foreach($commande->plat as $plat){
                $totalRestaurant = $totalRestaurant + $plat->prix;
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
        return view('reservations.facture',
            compact('reservation','montantNuite','hotel','jour','commandes','taxeSejour','tvaHotel',
            'tvaRestaurant','totalRestaurant'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Affecte;
use App\Chambre;
use App\Client;
use App\Reservation;
use App\Tarif;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


use Calendar;
class ReservationController extends Controller
{
    public function __construct(){
        $this->middleware(['auth']);
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
            'id_tarif' => 'required',
            'chambres' => 'required'
        ]);
        $request->merge(['id_user'=> Auth::id()]);

        $reservaion = Reservation::create($request->all());
        $chambres = $request['chambres'];

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

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $reservation = Reservation::findOrFail($id);
        return view('reservations.edit', compact('reservation'));
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
            'id_user' => 'required'
        ]);
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

    public function affecter(){

    }
}

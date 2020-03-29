<?php

namespace App\Http\Controllers;

use App\Tarif;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TarifController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(){
        $this->middleware(['auth', 'caissier'])->except( 'show');
    }

    public function index()
    {
        $tarifs= Tarif::all();
        return view ('tarifs.index', compact('tarifs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tarifs.add');
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
            'prix' => 'required',
            'nbre_personne' => 'required',
        ]);

        $user = Auth::user();
        $request->merge(['hotel_id'=>$user->hotel_id]);
        Tarif::create($request->all());
        return redirect()->route('tarifs.index')->with('success', 'Tarif enregistré avec succès');

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
        $tarif = Tarif::find($id);
        return view('tarifs.edit', compact('tarif'));
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
            'prix' => 'required',
            'nbre_personne' => 'required',
        ]);
        $user = Auth::user();
        $request->merge(['hotel_id'=>$user->hotel_id]);
        Tarif::find($id)->update($request->all());
        return redirect()->route('tarifs.index')->with('success', 'Modification effectuée avec succès!!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $reservation = DB::table('tarifs')
            ->join('reservations','tarifs.id','=','reservations.tarif_id')
            ->where('reservations.tarif_id',$id)
            ->select('reservations.id')
            ->first();
        if($reservation){
            return redirect()->route('tarifs.index')->with('error','Impossible ce tarif est lié avec des réservations');
        }
        Tarif::find($id)->delete();
        return redirect()->route('tarifs.index')->with('success', 'Tarif supprimé avec succès');

    }

    public function AllarifForApi()
    {
        $tarifs= Tarif::all();
        return  response()->json($tarifs);
    }
}

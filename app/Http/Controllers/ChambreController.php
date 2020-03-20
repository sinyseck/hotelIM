<?php

namespace App\Http\Controllers;

use App\Chambre;
use App\Hotel;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ChambreController extends Controller
{


    public function __construct() {
        $this->middleware(['auth', 'caissier'])->except('show');
    }
    public function index()
    {
        $user = Auth::user();
        $chambres = Chambre::orderby('id', 'desc')
        ->where('hotel_id',$user->hotel_id)
        ->paginate(50); //show only 5 items at a time in descending order

        return view('chambres.index', ['chambres' =>  $chambres]); //compact('produits')
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('chambres.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'numero'=>'required|max:40|min:1',
        ]);
        $numero = $request['numero'];
        if($numero <0 ){
            return redirect()->back()->with('error','Numéro de chambre négatif');
        }
        $user = $user = DB::table('users')->find(Auth::id());

        $chambre = new Chambre();
        $chambre->numero = $numero;
        $chambre->hotel_id = $user->hotel_id;
        $chambre->save();
        return redirect()->route('chambres.index')
            ->with('flash_message',
                'Chambre '. $chambre->name.' Enregistré!');
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
        $chambre = Chambre::find($id);
        return view('chambres.edit',compact('chambre'));
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
        $numero = $request['numero'];
        if($numero <0 ){
            return redirect()->back()->with('error','Numéro de chambre négatif');
        }
        $this->validate($request, [
            'numero'=>'required|max:40',
        ]);
        Chambre::find($id)->update($request->all());
        return redirect()->route('chambres.index')->with('success','Chambre modifié avec succès');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Chambre::find($id)->delete();
        return redirect()->route('chambres.index')->with('success','Chambre supprimé avec succès');
    }
}

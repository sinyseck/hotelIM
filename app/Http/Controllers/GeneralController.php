<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;
use App\Commande;
use App\Table;

class GeneralController extends Controller
{
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
        $clients = Client::all();
        $tables = Table::all();
        return view('general.create', compact('clients','tables'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data['id_client'] = $request->get('id_client');
        $data['id_table'] = $request->get('id_table');
        Commande::create($data);

        $step1['nom'] = $request->get('nom');
        $step1['prix'] = $request->get('prix');
        $step1['commande_id'] = $data->id;

        Plat::create($step1);

        return redirect()->route('plats.add')->with('success', 'Commande enregistré avec succès!!!');
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

        $hotel = Hotel::find($id);
        return view('hotels.edit',compact('hotel'));
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
        $this->validate($request, [
            'nom'=>'required|max:200',
            'adresse' =>'required',
            'email' => 'required',
            'telephone' => 'required'
        ]);
        Hotel::find($id)->update($request->all());
        return redirect()->route('hotels.index')->with('success','hotel modifié avec succès');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Hotel::find($id)->delete();
        return redirect()->route('hotels.index')->with('success','hotel supprimé avec succès');
    }
}

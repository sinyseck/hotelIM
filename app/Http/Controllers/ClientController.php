<?php

namespace App\Http\Controllers;

use App\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = Client::orderby('id', 'desc')->paginate(50); //show only 5 items at a time in descending order

        return view('clients.index', ['clients' =>  $clients]); //compact('produits')
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('clients.add');
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
            'nom'=>'required',
            'prenom' =>'required',
            'adresse' =>'required',
            'telephone' =>'required',
            'email' =>'required',
            'numeroPiece' => 'required',
            'typePiece' => 'required',
            'nationalite' => 'required'
        ]);
        $client = new Client();
        $client->nom = $request['nom'];
        $client->prenom = $request['prenom'];
        $client->adresse = $request['adresse'];
        $client->telephone = $request['telephone'];
        $client->email = $request['email'];
        $client->numeroPiece = $request['numeroPiece'];
        $client->typePiece = $request['typePiece'];
        $client->nationalite = $request['nationalite'];
        $client->save();

        return redirect()->route('clients.index')
            ->with('flash_message',
                'Client  '. $client->nom.' '. $client->prenom.' Enregistré!');
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
}

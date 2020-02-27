<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ClientController extends Controller
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
        $clients = DB::table('clients')
            ->where('hotel_id',Auth::id())
            ->get();//Client::all();
        return view('clients.index', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('clients.create');
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
           'nom' => 'required',
           'prenom' => 'required',
           'typePiece' => 'required',
           'numeroPiece' => 'required',
           'nationalite' => 'required',
           'adresse' => 'required',
           'telephone' => 'required',
           'email' => 'required',
        ]);
        $request->merge(['hotel_id'=>Auth::id()]);
        Client::create($request->all());
        return redirect()->route('clients.index')->with('success','Client enregistré avec succès !!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $client = Client::find($id);
        return view('clients.show', compact('client'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $client = Client::find($id);
        return view('clients.edit', compact('client'));
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
            'nom' => 'required',
            'prenom' => 'required',
            'nationalite' => 'required',
            'typePiece' => 'required',
            'numeroPiece' => 'required',
            'adresse' => 'required',
            'telephone' => 'required',
            'email' => 'required',
        ]);
        Client::find($id)->update($request->all());
        return redirect()->route('clients.index')->with('success','Client modifié avec success!!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Client::find($id)->delete();
        return redirect()->route('clients.index')->with('success','Client supprimé succès');
    }
}

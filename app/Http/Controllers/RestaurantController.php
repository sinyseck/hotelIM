<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;
use App\Table;
use App\Produit;
use App\Restaurant;
use App\Compose;
use App\Restoproduit;

class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(){
        $this->middleware(['auth', 'clearance'])->except( 'show');
    }
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
        $tables = Table::all();
        $clients = Client::all();
        $produits = Produit::all();
        return view('restaurants.create', compact('produits','clients','tables','id_table'));
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
            'id_client' => 'required',
            'id_table' => 'required',
            'nom' => 'required',
            'prix' => 'required',
            'quantite' => 'required',
            'produits' => 'required',
        ]);
        $restaurant = Restaurant::create($request->all());

        $produits = $request['produits'];
        /*$produit = Produit::where([
            ['id', '=', $request->produit_id]
         ])->first();
         if ($produit) {
             $produit->decrement('quantite', $request->quantite);
         }*/

        foreach ($produits as $produit) {
        $restoproduit = new Restoproduit();
            //$compose->produit_id = implode(',',$produits);
            $restoproduit->produit_id = $produit;

            //$compose->produit_id = $produits->id;
            $restoproduit->restaurant_id = $restaurant->id;
            $restoproduit->save();
        }
        return redirect()->route('restaurants.index')->with('success','Commande enregistré!!!');
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

<?php

namespace App\Http\Controllers;

use App\Client;
use App\Commande;
use App\Produit;
use Illuminate\Http\Request;
use App\Plat;
use App\Compose;
use App\Table;
use PDF;
use DB;

class PlatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produit = Produit::all();
        $clients = Client::all();
        $commandes = Commande::all();
       $plats = Plat::all();

        return view('plats.index', compact('plats','produit','commandes','clients'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $plats = Plat::all();
        $tables = Table::all();
        $clients = Client::all();
        $commandes = Commande::all();
        $produits = Produit::all();
        return view('plats.create', compact('commandes','produits','clients','tables','id_table','plats'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        /*request()->validate([
            'id_client' => 'required',
            'id_table' => 'required',

        ]);
        $commande = Commande::create($request->all());*/

        /*$plat = Plat::create([
            'commande_id' => $commande->id,
            'nom' => $request->input('nom'),
            'prix' => $request->input('prix'),
            'quantite' => $request->input('quantite'),

        ]);*/
/*
        $plat['nom'] = $request->get('nom');
        $plat['prix'] = $request->get('prix');
        $plat['quantite'] = $request->get('quantite');
        $plat['commande_id'] = $commande->id;

        foreach ($request->addmore as $key => $value) {
           // $plat['commande_id'] = $commande->id;

            Plat::create($value);
            $plat->commande()->attach($commande->id);
        }

        //$plat= Plat::create($plat);
*/
        $data=$request->all();
        $lastid=Commande::create($data)->id;
        if((is_array($request->nom)) && (count($request->nom) > 0))
        {
            foreach($request->nom as $plat=>$v){
                $plat=array(
                    'commande_id'=>$lastid,
                    'nom'=>$request->nom[$plat],
                    'prix'=>$request->prix[$plat],
                    'quantite'=>$request->quantite[$plat]
                );
                $plat=Plat::create($plat);
            }
            $produits = $request['produits'];
        /*$produit = Produit::where([
            ['id', '=', $request->produit_id]
         ])->first();
         if ($produit) {
             $produit->decrement('quantite', $request->quantite);
         }*/
        foreach ($produits as $produit) {
           // DB::table('produits')->decrement('quantite', $request->quantite);
        $compose = new Compose();
            //$compose->produit_id = implode(',',$produits);
            $compose->produit_id = $produit;

            //$compose->produit_id = $produits->id;
            $compose->plat_id = $plat->id;
            $compose->save();
        }





        }
        return redirect()->route('commandes.index')->with('success','Commande enregistré!!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //$plat = Plat::find($id);
        //return view('plats.show', compact('plat','clients'));
        $plats = Plat::where('commande_id','=',$id)->get();
        return view('tests.new',compact('plats'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $produits = Produit::get(); //Get all roles

        $compose = Compose::all();
        $produits = Produit::all();
        $clients = Client::all();
        $tables = Table::all();
        $plat = Plat::find($id);
        return view('plats.edit', compact('produit','plat','clients','tables','produits','compose','produits'));

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
            'id_client' => 'required',
            'id_table' => 'required',

        ]);
        $commande = Commande::find($id)->update($request->all());


        $plat['nom'] = $request->get('nom');
        $plat['prix'] = $request->get('prix');
        $plat['quantite'] = $request->get('quantite');

        $plat['commande_id'] = $commande->id;

        $plat= Plat::update($plat);

        $produits = $request['produits'];

        if(isset($produits)) {
            // DB::table('produits')->decrement('quantite', $request->quantite);
         $compose = new Compose();
             //$compose->produit_id = implode(',',$produits);
             $compose->produit_id()->sync($produits);

             //$compose->produit_id = $produits->id;
             $compose->plat_id = $plat->id;
             $compose->update();
            }
         return redirect()->route('plats.index')->with('success','Plat enregistré!!!');


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

    public function facturePdf($id){
        $plat = Plat::find($id);

        $pdf = PDF::loadView('PDF.factureResto', compact('plat'));
        return $pdf->download('demonutslaravel.pdf');
    }

    public function newProduit($id){
        $produit = Produit::find($id);
        $plat = Plat::find($id);
        return view('plats.new', compact('produit','plat'));
    }


}

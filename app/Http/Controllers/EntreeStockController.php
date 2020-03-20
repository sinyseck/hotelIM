<?php

namespace App\Http\Controllers;

use App\EntreeStock;
use App\Produit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class EntreeStockController extends Controller
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
        $user = Auth::user();
        $produit = DB::table('produits')
            ->where('hotel_id' , $user->hotel_id)
            ->get();
        //$produit = Produit::all();
        $entreeStocks = DB::table('entreeStocks')
            ->join('produits','entreeStocks.id_produit','=','produits.id')
            ->where('produits.hotel_id',$user->hotel_id)
            ->select('entreeStocks.*', 'produits.nom')
            ->get();
       // $entreeStocks = EntreeStock::all();
        return view('entreeStocks.index', compact('entreeStocks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $produits = Produit::all();
        return view('entreeStocks.create', compact('produits'));
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
            'quantite' => 'required|min:1',
            'id_produit' => 'required',
        ]);
        if($request['quantite'] <0 ){
            return redirect()->back()->with('error','quantite  négatif');
        }
     /*   $produit = Produit::where([
            ['id', '=', $request->id_produit]
         ])->first();
         if ($produit) {
             $produit->increment('quantite', $request->quantite + $produit->quantite);
         }*/
        //dd($request->id_produit);
        $produit = Produit::find($request->id_produit);
        //dd($produit);
        $produit->quantite = $produit->quantite +  $request->quantite;
        $produit->save();
        EntreeStock::create($request->all());


        return redirect()->route('entreeStocks.index')->with('success','Stock enregistré avec succès!!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $entreeStock = EntreeStock::Find($id);
        return view('entreeStocks.show', compact('entreeStock'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = Auth::user();
        $entreeStock = EntreeStock::Find($id);
        $produits = DB::table('produits')
            ->where('hotel_id' , $user->hotel_id)
            ->get();
        return view('entreeStocks.edit', compact('entreeStock', 'produits'));
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
            'quantite' => 'required',
            'id_produit' => 'required',
        ]);
        if($request['quantite'] <0 ){
            return redirect()->back()->with('error','quantite  négatif');
        }
        EntreeStock::find($id)->update($request->all());
        return redirect()->route('entreeStocks.index')->with('success', 'Modification effectuée avec succès!!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        EntreeStock::find($id)->delete();
        return redirect()->route('entreeStocks.index')->with('success', 'Supprimé avec succès!!!');
    }
}

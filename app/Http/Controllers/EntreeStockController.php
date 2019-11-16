<?php

namespace App\Http\Controllers;

use App\EntreeStock;
use App\Produit;
use Illuminate\Http\Request;

class EntreeStockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produit = Produit::all();

        $entreeStocks = EntreeStock::all();
        return view('entreeStocks.index', compact('entreeStocks','produit'));
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
            'date'=> 'required',
            'quantite' => 'required',
            'id_produit' => 'required',
        ]);
        $produit = Produit::where([
            ['id', '=', $request->id_produit]
         ])->first();
         if ($produit) {
             $produit->increment('quantite', $request->quantite);
         } else {


            EntreeStock::create($request->all());
         }

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
        $entreeStock = EntreeStock::Find($id);
        $produits = Produit::all();
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
            'date' => 'required',
            'quantite' => 'required',
            'id_produit' => 'required',
        ]);
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

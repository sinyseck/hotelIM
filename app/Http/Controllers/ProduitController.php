<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Produit;
use Illuminate\Support\Facades\Auth;
use Session;
use PDF;

class ProduitController extends Controller
{
    public function __construct() {
        $this->middleware(['auth', 'clearance'])->except('index', 'show');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index() {
        $produits = Produit::orderby('id', 'desc')->paginate(5); //show only 5 items at a time in descending order

        return view('produits.index', ['produits' =>  $produits]); //compact('produits')
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('produits.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {

        //Validating nom and quantite field
        $this->validate($request, [
            'nom'=>'required|max:100',
            'quantite' =>'required|min:1',
            'pu' =>'required|min:1',
        ]);
            $user = Auth::user();
            $request->merge(['hotel_id'=>$user->hotel_id]);
            $produit = Produit::create($request->all());
            return redirect()->route('produits.index')->with('success','Stock enregistré avec succès!!!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $produit = Produit::find($id);
        return view('produits.show', compact('produit'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $produit = Produit::find($id);
        return view('produits.edit', compact('produit'));
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
            'quantite' => 'required',
            'pu' => 'required',
        ]);
        $user = Auth::user();
        $request->merge(['hotel_id'=>$user->hotel_id]);
        Produit::find($id)->update($request->all());
        return redirect()->route('produits.index')->with('success','Produit modifié avec succès');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Produit::find($id)->delete();
        return redirect()->route('produits.index')->with('success','Produit supprimé avec succès');
    }

    public function factureRestaurant()
    {


        return view('PDF.factureRestaurant');

    }

    public function pdf($id){
        $produit = Produit::find($id);

        $pdf = PDF::loadView('PDF.factureRestaurant', compact('produit'));
        return $pdf->download('demonutslaravel.pdf');
    }

}

<?php

namespace App\Http\Controllers;

use App\Commande;
use App\DetailCommande;
use App\Produit;
use Illuminate\Http\Request;
use App\Client;
use App\Table;
use App\Plat;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PDF;


class CommandeController extends Controller
{
    public function __construct(){
        $this->middleware(['auth', 'caissier'])->except( 'show');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $commandes = Commande::all();
        return view('commandes.index', compact('commandes'));
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
        $plats= Plat::all();
        return view('commandes.create', compact('clients','tables','plats'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        //  dd($request->all());
        $plats = $request['plats'];
        $quantite = $request['quantite'];
        $arrlength = count($request['plats']);
        for($x = 0; $x < $arrlength; $x++) {
            //$plat = Plat::find($plats[$x]);
            $plat = Plat::with(['composes','composes','composes.produit'])
                ->where('id',$plats[$x])
                ->first();
            foreach($plat->composes as $compose){
                if($compose->produit->quantite < $quantite[$x] ){
                    return redirect()->route('commandes.create')->with('error',' Stock inssufisant!!!'.$compose->produit->nom);
                }
                if( $quantite[$x] < 0){
                    return redirect()->route('commandes.create')->with('error',' impossiblle quantite insuffisant!!!'.$compose->produit->nom);
                }
            }

        }
        for($x = 0; $x < $arrlength; $x++) {
            $plat = Plat::with(['composes','composes','composes.produit'])
                ->where('id',$plats[$x])
                ->first();
            foreach($plat->composes as $compose){
                $produit = Produit::findOrFail($compose->produit->id);
                $produit->quantite =  $produit->quantite - $quantite[$x];
                $produit->save();

            }

        }
        $user = Auth::user();
        $request->merge(['hotel_id'=>$user->hotel_id]);
        $data=$request->all();
        $lastid=Commande::create($data)->id;
       // $request->merge(['commande_id' => $lastid]);
        for($x = 0; $x < $arrlength; $x++) {

            $detailCommande = new DetailCommande();
            //$compose->plat_id = implode(',',$plats);
            $detailCommande->plat_id = $plats[$x];
            $detailCommande->quantite = $quantite[$x];
            $detailCommande->commande_id = $lastid;
            $detailCommande->save();
        }


        return redirect()->route('commandes.index')->with('success','Commande enregistré!!!');
    }

   /* public function store(Request $request)
    {
        request()->validate([
            'id_client' => 'required',
            'id_table' => 'required',
        ]);
        Commande::create($request->all());
        return redirect()->route('plats.create');//->with('success', 'Commande enregistré avec succès!!!');
    }*/

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //$commandes = Commande::all();
        $commande = Commande::with(['client'])
            ->where('id',$id)
            ->first();
        $detailCommandes = DetailCommande::with(['plat','commande','commande.client'])
            ->where('commande_id',$id)
            ->get();
        //$plats = Plat::where('commande_id','=',$id)->get();
        return view('commandes.show',compact('commande','detailCommandes'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $clients = Client::all();
        $tables = Table::all();
        $plats= Plat::all();
        $commande = Commande::with(['detailCommandes','detailCommandes.plat','client'])
        ->where('id',$id)
        ->first();

        return view('commandes.edit', compact('clients','tables','plats','commande'));
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
        $plats = $request['plats'];
        $quantite = $request['quantite'];
        $arrlength = count($request['plats']);
        for($x = 0; $x < $arrlength; $x++) {
            //$plat = Plat::find($plats[$x]);
            $plat = Plat::with(['composes','composes','composes.produit'])
                ->where('id',$plats[$x])
                ->first();
            foreach($plat->composes as $compose){
                if($compose->produit->quantite < $quantite[$x] ){
                    return redirect()->route('commandes.create')->with('error',' Stock inssufisant!!!'.$compose->produit->nom);
                }
                if( $quantite[$x] < 0){
                    return redirect()->route('commandes.create')->with('error',' impossiblle quantite insuffisant!!!'.$compose->produit->nom);
                }
            }

        }
        for($x = 0; $x < $arrlength; $x++) {
            $plat = Plat::with(['composes','composes','composes.produit'])
                ->where('id',$plats[$x])
                ->first();
            foreach($plat->composes as $compose){
                $produit = Produit::findOrFail($compose->produit->id);
                $produit->quantite =  $produit->quantite - $quantite[$x];
                $produit->save();

            }

        }
        DetailCommande::where('commande_id',$id)->delete();
        $user = Auth::user();
        $request->merge(['hotel_id'=>$user->hotel_id]);
        $data=$request->all();
      //  $lastid=Commande::create($data)->id;
        // $request->merge(['commande_id' => $lastid]);
        for($x = 0; $x < $arrlength; $x++) {

            $detailCommande = new DetailCommande();
            //$compose->plat_id = implode(',',$plats);
            $detailCommande->plat_id = $plats[$x];
            $detailCommande->quantite = $quantite[$x];
            $detailCommande->commande_id =$id;
            $detailCommande->save();
        }


        return redirect()->route('commandes.index')->with('success','Commande Modifié!!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DetailCommande::where('commande_id',$id)->delete();
        Commande::find($id)->delete();
        return redirect()->route('commandes.index')->with('success','Commande Supprimé!!!');
    }
    public function facturePdf($id){
        //$plat = Plat::find($id);
        //$plats = Plat::where('commande_id','=',$id)->get();
       /* $commande = Commande::with(['client'])
            ->where('id',$id)
            ->first();
        $detailCommandes = DetailCommande::with(['plat','commande','commande.client'])
            ->where('commande_id',$id)
            ->get();
        $pdf = PDF::loadView('PDF.factureResto', compact('commande','detailCommandes'));
        return $pdf->download('demonutslaravel.pdf');*/
        $totalRestaurant =0;
        $commande = Commande::with(['detailCommandes','detailCommandes.plat','client'])
            ->where('id',$id)
            ->first();

            foreach($commande->detailCommandes as $detailCommande){
                $totalRestaurant = $totalRestaurant + ($detailCommande->plat->prix *$detailCommande->quantite);
            }

        $tvaRestaurant = ($totalRestaurant * 10)/100;
        $user = $user = DB::table('users')->find(Auth::id());
        $hotel = DB::table('hotels')->find($user->hotel_id);
        return view('PDF.facture',compact('commande','totalRestaurant','tvaRestaurant','hotel'));
    }

}

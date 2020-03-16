<?php

namespace App\Http\Controllers;

use App\Reservation;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $reservations = Reservation::with(['client','chambres',])->orderBy('id','desc')->get();
       $chiffreAffaireDuJour =  DB::table('paiements')
           ->whereDate('created_at', '=', Carbon::now()->toDateString())
           ->max('montant');
        $chiffreAffaireDuSemaine =  DB::table('paiements')
            ->whereBetween( 'updated_at', [Carbon::today()->startOfWeek(), Carbon::today()->endOfWeek()] )
            ->max('montant');

        $chiffreAffaireDuMois =  DB::table('paiements')
            ->whereBetween( 'updated_at', [Carbon::today()->startOfMonth(), Carbon::today()->endOfMonth()] )
            ->max('montant');
       $plats = DB::table('detail_commandes')
           ->join('plats','detail_commandes.plat_id','=','plats.id')
        ->select('plats.nom', DB::raw('SUM(detail_commandes.quantite) as total_sales'))
        ->groupBy('plats.nom')
        ->get();
       // dd($plats);


        return view('home', compact('plats','chiffreAffaireDuJour','chiffreAffaireDuSemaine','chiffreAffaireDuMois','reservations'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Reservation;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        $user = Auth::user();
        $reservations = Reservation::with(['client','chambres',])
            ->where('hotel_id',$user->hotel_id)
            ->orderBy('id','desc')
            ->get();
       // dd($reservations);
       $chiffreAffaireDuJour =  DB::table('paiements')
           ->whereDate('created_at', '=', Carbon::now()->toDateString())
           ->where('hotel_id',$user->hotel_id)
           ->max('montant');
        $chiffreAffaireDuSemaine =  DB::table('paiements')
            ->whereBetween( 'updated_at', [Carbon::today()->startOfWeek(), Carbon::today()->endOfWeek()] )
            ->where('hotel_id',$user->hotel_id)
            ->max('montant');

        $chiffreAffaireDuMois =  DB::table('paiements')
            ->whereBetween( 'updated_at', [Carbon::today()->startOfMonth(), Carbon::today()->endOfMonth()] )
            ->where('hotel_id',$user->hotel_id)
            ->max('montant');
       $plats = DB::table('detail_commandes')
           ->join('plats','detail_commandes.plat_id','=','plats.id')
           ->where('plats.hotel_id',$user->hotel_id)
        ->select('plats.nom', DB::raw('SUM(detail_commandes.quantite) as total_sales'))

        ->groupBy('plats.nom')

        ->get();
       // dd($plats);


        return view('home', compact('plats','chiffreAffaireDuJour','chiffreAffaireDuSemaine','chiffreAffaireDuMois','reservations'));
    }
}

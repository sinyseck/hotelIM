<?php

namespace App\Http\Controllers;

use App\Produit;
use App\Table;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TableController extends Controller
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
        $tables = DB::table('tables')
            ->where('hotel_id',$user->hotel_id)
            ->get();
            //Table::all();
        return view ('tables.index', compact('tables'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tables.create');
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
            'numero' => 'required',
        ]);
        if($request['numero'] < 1){
            return redirect()->route('tables.create')->with('error', 'Numéro table négatif');
        }
        $user = Auth::user();
        $request->merge(['hotel_id'=>$user->hotel_id]);
        Table::create($request->all());
        return redirect()->route('tables.index')->with('success', 'Table enregistré avec succès');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $table = Table::find($id);
        return view('tables.show', compact('table'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $table = Table::find($id);
        return view('tables.edit', compact('table'));
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
            'numero' => 'required',
        ]);
        if($request['numero'] < 1){
            $table = Table::find($id);
           // return view('tables.edit', compact('table'));
            return redirect()->route('tables.edit', compact('table'))->with('error', 'Numéro table négatif');
        }
        $user = Auth::user();
        $request->merge(['hotel_id'=>$user->hotel_id]);
        Table::find($id)->update($request->all());
        return redirect()->route('tables.index')->with('success', 'Numéro de tables modifié avec succès!!!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Table::find($id)->delete();
        return redirect()->route('tables.index')->with('success', 'Numéro de table supprimé avec succès');
    }
}

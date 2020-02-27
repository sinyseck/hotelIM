<?php

namespace App\Http\Controllers;

use App\Hotel;
use Illuminate\Http\Request;

class HotelController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hotels = Hotel::orderby('id', 'desc')->paginate(50);
        return view('hotels.lister',compact('hotels'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('hotels.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nom'=>'required|max:200',
            'logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'adresse' =>'required',
            'email' => 'required',
            'telephone' => 'required'
        ]);
        $hotel = new Hotel();
        if ($files = $request->file('logo')) {
            $destinationPath = 'public/image/'; // upload path
            $profileImage =  time(). "." . $files->getClientOriginalExtension();
            $files->move($destinationPath, $profileImage);
            $hotel->logo= "$profileImage";
        }
        $hotel->nom = $request['nom'];
        $hotel->adresse = $request['adresse'];
        $hotel->email = $request['email'];
        $hotel->telephone = $request['telephone'];
        $hotel->save();
        return redirect()->back();

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

        $hotel = Hotel::find($id);
        return view('hotels.edit',compact('hotel'));
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
        $this->validate($request, [
            'nom'=>'required|max:200',
            'adresse' =>'required',
            'email' => 'required',
            'telephone' => 'required'
        ]);
        Hotel::find($id)->update($request->all());
        return redirect()->route('hotels.index')->with('success','hotel modifié avec succès');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Hotel::find($id)->delete();
        return redirect()->route('hotels.index')->with('success','hotel supprimé avec succès');
    }
}
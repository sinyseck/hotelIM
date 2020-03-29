<?php

namespace App\Http\Controllers;

use App\Hotel;
use Illuminate\Http\Request;

use App\User;
//use Auth;

//Importing laravel-permission models
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

//Enables us to output flash messaging
use Session;

class UserController extends Controller {

    public function __construct() {
        $this->middleware(['auth', 'isAdmin'])->except(['editSimple','updateSimple']); //isAdmin middleware lets only users with a //specific permission permission to access these resources
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        //Get all users and pass it to the view
        $user = Auth::user();
        if($user->hotel_id) {
            $users = User::where('hotel_id', $user->hotel_id)->get();
        }else{
            $users = User::all();
        }
        return view('users.index')->with('users', $users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        //Get all roles and pass it to the view

        //$hotels = Hotel::all();
        $user = Auth::user();
        if($user->hotel_id){
            $hotels = DB::table('hotels')
                ->where('id',$user->hotel_id)
                ->pluck('nom', 'id');
            $roles = DB::table('roles')
                ->where('name','!=','SuperAdmin')
                ->get();
        }else{
             $hotels = Hotel::pluck('nom', 'id');
            $roles = Role::get();
        }
        //$hotels =
        // Hotel::pluck('nom', 'id');
        return view('users.create', ['roles'=>$roles,'hotels'=>$hotels]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        //Validate name, email and password fields
        $this->validate($request, [
            'name'=>'required|max:120',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:6|confirmed',
            'hotel_id' =>'required',
        ]);

        $user = User::create($request->only('email', 'name', 'password','hotel_id')); //Retrieving only the email and password data

        $roles = $request['roles']; //Retrieving the roles field
        //Checking if a role was selected
        if (isset($roles)) {

            foreach ($roles as $role) {
                $role_r = Role::where('id', '=', $role)->firstOrFail();
                $user->assignRole($role_r); //Assigning role to user
            }
        }
        //Redirect to the users.index view and display message
        return redirect()->route('users.index')
            ->with('success',
                'Utilisateur crée avec succées.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        return redirect('users');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $user = User::findOrFail($id); //Get user with specified id
        /*$roles = Role::get(); //Get all roles
        $hotels = Hotel::pluck('nom', 'id');*/
        $users = Auth::user();
        if($users->hotel_id){
            $hotels = DB::table('hotels')
                ->where('id',$users->hotel_id)
                ->pluck('nom', 'id');
            $roles = DB::table('roles')
                ->where('name','!=','SuperAdmin')
                ->get();
        }else{
            $hotels = Hotel::pluck('nom', 'id');
            $roles = Role::get();
        }
        return view('users.edit', compact('user', 'roles','hotels')); //pass user and roles data to view

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $user = User::findOrFail($id); //Get role specified by id
        if($request['password']){
            $this->validate($request, [
                'name'=>'required|max:120',
                'email'=>'required|email|unique:users,email,'.$id,
                'password'=>'min:6|confirmed'
            ]);
            $input = $request->only(['name', 'email', 'password']); //Retreive the name, email and password fields
        }else {
            $this->validate($request, [
                'name'=>'required|max:120',
                'email'=>'required|email|unique:users,email,'.$id,
            ]);
            $input = $request->only(['name', 'email']); //Retreive the name, email and password fields
        }

        //Validate name, email and password fields

        $roles = $request['roles']; //Retreive all roles
        $user->fill($input)->save();

        if (isset($roles)) {
            $user->roles()->sync($roles);  //If one or more role is selected associate user to roles
        }
        else {
            $user->roles()->detach(); //If no role is selected remove exisiting role associated to a user
        }
        return redirect()->route('users.index')
            ->with('success',
                'Utilisateur modifié.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        //Find a user with a given id and delete
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('users.index')
            ->with('flash_message',
                'User successfully deleted.');
    }


    public function editSimple($id) {
        $idConnecte = Auth::id();
        if($id!=$idConnecte){
            return view("errors.401");
        }
        $user = User::findOrFail($id); //Get user with specified id
        /*$roles = Role::get(); //Get all roles
        $hotels = Hotel::pluck('nom', 'id');*/

        $users = Auth::user();
       /* if($users->hotel_id){
            $hotels = DB::table('hotels')
                ->where('id',$users->hotel_id)
                ->pluck('nom', 'id');
            $roles = DB::table('roles')
                ->where('name','!=','SuperAdmin')
                ->get();
        }else{
            $hotels = Hotel::pluck('nom', 'id');
            $roles = Role::get();
        }*/
        return view('users.editsimple', compact('user')); //pass user and roles data to view

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateSimple(Request $request, $id) {
        $user = User::findOrFail($id); //Get role specified by id
        if($request['password']){
            $this->validate($request, [
                'name'=>'required|max:120',
                'email'=>'required|email|unique:users,email,'.$id,
                'password'=>'min:6|confirmed'
            ]);
            $input = $request->only(['name', 'email', 'password']); //Retreive the name, email and password fields
        }else {
            $this->validate($request, [
                'name'=>'required|max:120',
                'email'=>'required|email|unique:users,email,'.$id,
            ]);
            $input = $request->only(['name', 'email']); //Retreive the name, email and password fields
        }


        $user->fill($input)->save();


        return redirect()->route('home')
            ->with('success',
                'Utilisateur modifié.');
    }
}

<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


//use Spatie\Permission\Models\Permission;
//use Spatie\Permission\Models\Role;

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::resource('users', 'UserController');

Route::resource('roles', 'RoleController');

Route::resource('permissions', 'PermissionController');

Route::resource('produits', 'ProduitController');
Route::resource('hotels', 'HotelController');
Route::resource('chambres', 'ChambreController');
//Route::get('/create_role_permission', function () {
   // $role = Role::create(['name' => 'Administre']);
  //  $permission = Permission::create(['name' => 'creer role et permission']);
  //  auth()->user()->assignRole('Administre');
   // auth()->user()->givePermissionTo('creer role et permission');
    //return view('welcome');
//});

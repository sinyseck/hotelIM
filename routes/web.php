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


Route::get('/', function () {
    return view('welcome');
})->middleware('auth');

Route::get('/client', function () {
    return view('clients.create');
});
Route::get('/logout', function () {
    return view('clients.create');
});
Auth::routes();




Route::resource('produits', 'ProduitController');

Route::resource('entreeStocks', 'EntreeStockController');

Route::resource('tables', 'TableController');
Route::resource('users', 'UserController');

Route::resource('roles', 'RoleController');

Route::resource('permissions', 'PermissionController');

Route::resource('tarifs', 'TarifController');

Route::resource('hotels', 'HotelController');
Route::resource('chambres', 'ChambreController');
Route::resource('clients', 'ClientController');
Route::resource('reservations', 'ReservationController');
//Route::get('/create_role_permission', function () {
   // $role = Role::create(['name' => 'Administre']);
  //  $permission = Permission::create(['name' => 'creer role et permission']);
  //  auth()->user()->assignRole('Administre');
   // auth()->user()->givePermissionTo('creer role et permission');
    //return view('welcome');
//});

Route::resource('commandes', 'CommandeController');

Route::get('calendrier', 'ReservationController@caliendrier')
    ->name('calendrier');
Route::get('facture/{id}', 'ReservationController@facturerReservartion')
    ->name('facturer.voir');
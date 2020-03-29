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


Route::get('/','HomeController@index' )->name('home')->middleware('auth');

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
Route::get('/hotels/{hotel}/edit', 'HotelController@edit')->name('hotels.edit')->middleware('isAdmin');
Route::put('/hotels/{hotel}', 'HotelController@update')->name('hotels.update')->middleware('isAdmin');
Route::resource('hotels', 'HotelController');
Route::resource('chambres', 'ChambreController');
Route::resource('clients', 'ClientController');
Route::resource('reservations', 'ReservationController');


Route::resource('commandes', 'CommandeController');

Route::get('calendrier', 'ReservationController@caliendrier')
    ->name('calendrier');
Route::get('/paiement/valider/{id}', 'PaiementController@validerPaiement')
    ->name('paiement.valider');

Route::get('facture/{id}', 'ReservationController@facturerReservartion')
    ->name('facturer.voir');


Route::resource('plats', 'PlatController');

Route::resource('panier', 'PanierController');


Route::get('/facturePdf/{id}', 'CommandeController@facturePdf');

Route::get('/mon/hotel', 'HotelController@monHotel')->name('mon.hotel');

Route::get('/modifier/user/{user}', 'UserController@editSimple')->name('modifier.user');

Route::put('/modifier/user/{user}', 'UserController@updateSimple')->name('modification.user');

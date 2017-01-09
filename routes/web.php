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
});

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('halls/{id}', function($id){
    $hall = App\Hall::findOrFail($id);
    $stands = $hall->stands;
    foreach ($stands as $stand) {
        if (!empty($stand->booking_id)) {
            $st = App\Stand::findOrFail($stand->booking_id)->booking;
            print_r($st);
            echo '<br><br><br>';
        }
    }
    $hallData = [
        'hall_id' => $hall->id,
        'hall_name' => $hall->name,
        'hall_stand' => $stands
    ];
    //dd($hallData);
});

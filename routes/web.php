<?php

use Illuminate\Support\Facades\Route;

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

//  Route::get('/codes/create', function () {
//     return view('create');
// }); 

Route::get('/codes/create', 'App\Http\Controllers\CodeController@create');
Route::post('/codes/create', 'App\Http\Controllers\CodeController@create');
Route::get('/codes', 'App\Http\Controllers\CodeController@show');
Route::get('/codes/delete', 'App\Http\Controllers\CodeController@destroy');
Route::post('/codes/delete', 'App\Http\Controllers\CodeController@destroy');
?>
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

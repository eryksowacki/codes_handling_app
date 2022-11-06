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

Route::get('/', function () {
    return view('codes');
});

Route::get('/codes/create', function () {
    return view('create');
});

Route::get('/codes/delete', function () {
    return view('delete');
});

Route::get('/codes', 'App\Http\Controllers\CodeController@index');
?>
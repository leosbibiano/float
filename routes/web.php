<?php

use App\Http\Controllers\LoginController;
use Illuminate\Http\Request;
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

Route::group(['prefix' => 'login', 'as' => 'login.'], function () {
    Route::get('/', function(){
        return 'Necessário entrar novamente!';
    })->name('index');

    Route::get('/registro-instancia', [LoginController::class, 'registroInstancia'])->name('registro-instancia');

    Route::get('/sign-in', [LoginController::class, 'signIn'])->middleware('tenant')->name('sign-in');
});

Route::group(['prefix' => 'lilitu', 'as' => 'lilitu.'], function () {
    Route::get('/teste', function(Request $request){
        dd($request);
    });
});

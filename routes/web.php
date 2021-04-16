<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ListeController;
use App\Http\Controllers\AjoutController;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\ModificationController;
use App\Http\Controllers\AjouterController;
use App\Http\Controllers\ModifierController;


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

Route::get('/',ListeController::class)->name("index");
Route::get('/produits',ListeController::class);
Route::get('/produits/ajout',[AjoutController::class, 'show'])->name("ajout");
Route::get('/produits/{id}',DetailController::class)->name("detail");
Route::get('/produits/{id}/edition',[ModificationController::class,'show'])->name("modification");

Route::post('/produits/ajout',[AjouterController::class, 'AjouterProduit'])->name("ajouter");
Route::put('/produits/{id}/edition',[ModifierController::class, 'ModifierProduit'])->name("modifier");

Route::fallback(function (){
    return view('errors.404');
})->name("erreur");



<?php

use App\Http\Controllers\Api\ProduitApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('/produits/ajout',[ProduitApiController::class, 'ajouterApi'])->name('api_ajouter');//ajouter produit
Route::get('/produits',[ProduitApiController::class, 'listeApi'])->name("api_liste");//obtenir liste
Route::get('/produits/{id}',[ProduitApiController::class,'infoApi'])->name("api_info");//obtenir info
Route::put('/produits/{id}',[ProduitApiController::class, 'modifierApi'])->name("api_modifier");//modifier produit
Route::put('/produits/{id}/{nouvelle_quantite}',[ProduitApiController::class, 'modifierQuantiteApi'])->name("api_quantite");//modifier quantite produit
Route::delete('/produits/{id}',[ProduitApiController::class, 'deleteApi'])->name("api_delete");//supprimer produit

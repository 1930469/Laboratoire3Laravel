<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use Illuminate\Http\Request;

class ListeController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function __invoke()
    {
        //$data = ["listeproduit"=>config("app.listeproduit")];
        $db = Produit::query()->select("nom",'image','quantite','id')->get();// au lieu de "Produit::all()" pour pouvoir choisir quelle donne envoyé
        $tableaffichage=[]; //pour avoir un tableau vide pour pourvoir stocker des string et non des objets
        foreach($db as $yuumi){

            array_push($tableaffichage, $yuumi->getAttributes());//insere la valeur dans le tableau
        }
       return view('liste',["db"=>$db]);//["db"=>$db] tableau associatif pour pouvoir lui donner un nom et l'appeler dans le blade
    }
    //{{var_dump($produit->getAttributes())}} -> permet de voir ce que contien le produit (à mettre dans l'html)
}

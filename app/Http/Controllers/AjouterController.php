<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class AjouterController extends Controller
{

    public function AjouterProduit(Request  $request){
        $validatedData = $request->validate([
            'nom' => ['required', 'max:255'],
            'prix' => ['required','max:99999','numeric'],
            'fournisseur'=> ['required','max:100'],
            'quantite'=> ['max:99999','numeric'],
            'description'=> ['max:500'],
            'image'=> ['required'],
        ]);
        $destinationPath = "/images/";
        $fileName = Str::random(69).".png";
        Produit::create([
            'nom' => $request->input('nom'),
            'prix' => $request->input('prix'),
            'fournisseur' => $request->input('fournisseur'),
            'quantite' => $request->input('quantite'),
            'description' => $request->input('description'),
            'image' => "images/".$fileName,

        ]);
        $request->file('image')->move("images/",$fileName);
        return redirect()->route("index");
    }
}

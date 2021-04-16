<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class ModifierController extends Controller
{
    public function ModifierProduit(Request $request,$id){
        $validatedData = $request->validate([
            'nom' => ['max:255'],
            'prix' => ['max:99999','numeric'],
            'fournisseur'=>['max:100'],
            'quantite'=>['max:99999','numeric'],
            'description'=>['max:500'],

        ]);

        $modifproduit = Produit::find($id);
        if($request->filled('nom')){//filled fait en sorte que ça modifie seulement si il est rempli
            $modifproduit->nom = $request->input('nom');
        }
        if($request->filled('prix')){
            $modifproduit->prix = $request->input('prix');
        }
        if($request->hasFile('image')){
            $destinationPath = "images/";
            $fileName = Str::random(69).".png";
            $oldFile = $modifproduit->image;
            $modifproduit->image = "images/".$fileName;
            $request->file('image')->move("images/",$fileName);
            $this->deleteFile($oldFile);

        }
        if($request->filled('fournisseur')){
            $modifproduit->fournisseur = $request->input('fournisseur');
        }
        if($request->filled('quantite')){
            $modifproduit->quantite = $request->input('quantite');
        }
        if($request->filled('description')){
            $modifproduit->description = $request->input('description');
        }
        $modifproduit->save();

        return redirect()->route("index");

    }
    public function deleteFile($fileName){
        if(File::exists($fileName)){
            File::delete($fileName);
        }

    }
}

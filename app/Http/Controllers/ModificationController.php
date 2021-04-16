<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use Illuminate\Http\Request;

class ModificationController extends Controller
{
    public function show($id){
        //$data = config("app.listeproduit")[$id-1];
        $data = Produit::find($id);
        if(Produit::where('id',$id)->exists())
        {
            return view('modification',$data->getAttributes());
        }
        else
        {
            return view('errors.404', []);
        }

    }
}

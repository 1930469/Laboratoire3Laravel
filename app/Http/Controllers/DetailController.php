<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use Illuminate\Http\Request;

class DetailController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function __invoke($id)
    {
        //$data = config("app.listeproduit")[$id-1];
        $data = Produit::find($id);
        if(Produit::where('id',$id)->exists())
        {
            return view('produit',$data->getAttributes());
        }
        else
        {
            return view('errors.404', []);
        }

    }
}

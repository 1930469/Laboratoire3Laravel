<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Produit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class ProduitApiController extends Controller
{
    public function ajouterApi(Request $request){
        $validator = Validator::make($request->all(), [
            'nom' => 'required',
            'prix' => 'required',
            'fournisseur' => 'required',
            'quantite' => 'required',
            'description' => 'required',
            //'image' => 'required',
        ]);
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors(),500);
        }
        $fileName = Str::random(69).".png";
        $fileToCreate = "images/".$fileName;
        if(!file_exists($fileToCreate)) {
            $file = fopen($fileToCreate, "w"); //on créé le fichier
            $fileDecoded = base64_decode($request->get('image')); // le fichier décodé
            fwrite($file, $fileDecoded); // on l'écrit avec le code décodé de la base64
            fclose($file); // on ferme le fichier
        }
        $result = Produit::create([
            'nom' => $request->get('nom'),
            'prix' => $request->get('prix'),
            'fournisseur' => $request->get('fournisseur'),
            'quantite' => $request->get('quantite'),
            'description' => $request->get('description'),
            'image' => $fileToCreate,
        ]);
        $message = 'Success';
        return $this->sendResponse($result,$message);

    }
    public function listeApi(){

        $db = Produit::query()->select("nom",'image','quantite','id')->get();
        $tableaffichage=[];
        foreach($db as $yuumi){

            array_push($tableaffichage, $yuumi->getAttributes());
        }
        $message = 'Success';
        return $this->sendResponse($db,$message);
    }
    public function infoApi($id){
        $data = Produit::where('id',$id);
        if($data->exists())
        {
            $message = 'Success';
            $data->get()->getAttributes();
            return $this->sendResponse($data,$message);
        }
        else
        {
            return $this->sendError('Wrong ID.',404);
        }
    }
    public function modifierApi(Request $request,$id){
        $modifproduit = Produit::where('id',$id);
        if($modifproduit->exists()){
            if($request->filled('nom')){
                $modifproduit->nom = $request->get('nom');
            }
            if($request->filled('prix')){
                $modifproduit->prix = $request->get('prix');
            }
            if($request->filled('fournisseur')){
                $modifproduit->fournisseur = $request->get('fournisseur');
            }
            if($request->filled('quantite')){
                $modifproduit->quantite = $request->get('quantite');
            }
            if($request->filled('description')){
                $modifproduit->description = $request->get('description');
            }

            $message = 'Success';
            $modifproduit->save();
            return $this->sendResponse($modifproduit,$message);
        }
        else{
            return $this->sendError('Wrong ID.',404);
        }

    }
    public function deleteApi($id){
        $data = Produit::where('id',$id);
        if($data->exists())
        {
            $message = 'Success';
            $data->get()[0]->delete();
            return $this->sendResponse($data,$message);
        }
        else
        {
            return $this->sendError('Wrong ID.',404);
        }
    }
    public function modifierQuantiteApi(Request $request,$id,$nouvelle_quantite){
        $modifproduit = Produit::where('id',$id);
        $message = 'Success';
        if($modifproduit->exists() && !is_null($nouvelle_quantite) && $nouvelle_quantite >= 0){
            $ffff = $modifproduit->get()[0];
            $ffff->quantite = $nouvelle_quantite;
            $ffff->save();
            return $this->sendResponse($modifproduit,$message);
        }
        else{
            return $this->sendError('Wrong ID.',404);
        }

    }
    public function sendResponse($result, $message)
    {
        $response = [
            'success' => true,
            'data'    => $result,
            'message' => $message,
        ];
        return response()->json($response, 200);
    }
    public function sendError($error, $errorMessages = [], $code = 404)
    {
        $response = [
            'success' => false,
            'message' => $error,
        ];
        if(!empty($errorMessages)){
            $response['data'] = $errorMessages;
        }
        return response()->json($response, $code);
    }
}


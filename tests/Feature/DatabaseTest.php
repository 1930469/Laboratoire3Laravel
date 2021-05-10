<?php

namespace Tests\Feature;

use App\Models\Produit;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class databaseTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testdetailTest(){

        $produit = [
            'id' => 1,
            'nom' => 'Casquette',
            'prix' => 20,
            'fournisseur' => 'Kiabi',
            'quantite' => 100,

        ];
        $testProduit = Produit::query()->select('id','nom','prix','fournisseur','quantite')->where('id','=',1)->get()->first()->getAttributes();
        $tableauDb =[
            "id" => $testProduit["id"],
            "nom" => $testProduit["nom"],
            "prix" => $testProduit["prix"],
            "fournisseur" => $testProduit["fournisseur"],
            "quantite" => $testProduit["quantite"],
        ];
        $this->assertEquals($tableauDb , $produit);
    }
    public function testAjoutTest(){
        Produit::create([
            'nom' => 'Prof particulier',
            'prix' => 10000,
            'fournisseur' => 'Willy',
            'quantite' => 1,
            'description' => "C'est un prof qui bosse dans le laravel",
        ]);
        $produitAjoutTest = Produit::query()->select('nom','prix','fournisseur','quantite','description')
            ->where([['nom','=','Prof particulier'],['prix','=',10000],['fournisseur','=','Willy'],['quantite','=',1],['description','=',"C'est un prof qui bosse dans le laravel"]])
            ->get()->first()->getAttributes();

        $this->assertEquals($produitAjoutTest,['nom' => 'Prof particulier',
            'prix' => 10000,
            'fournisseur' => 'Willy',
            'quantite' => 1,
            'description' => "C'est un prof qui bosse dans le laravel",]);
    }
}

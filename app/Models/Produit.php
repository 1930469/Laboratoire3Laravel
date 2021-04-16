<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    protected $table = "produit";
    protected $fillable= [
        'nom',
        'prix',
        'image',
        'quantite',
        'fournisseur',
        'description',
        'created_at',
        'updated_at',
    ];
    use HasFactory;
}

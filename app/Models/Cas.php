<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cas extends Model
{
    use HasFactory;
    protected $primaryKey='idCas';
    protected $fillable = ['idCas', 'listeCas'];

    public function dossiers()
    {
        return $this->hasMany(Dossier::class, 'idCa', 'idCas');
    }
}

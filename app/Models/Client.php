<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
    protected $primaryKey='idClient';
    protected $fillable=[
                            'nomClient','prenomClient','tel1','tel2',
                            'adressClient','emailClient','imageClient'
                        ];
    public function dossier() {
        return $this->belongsTo(Dossier::class, 'idDossier');
    }
}

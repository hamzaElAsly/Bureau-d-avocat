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
                            'adressClient','emailClient','imageClient','type_client',
                            'identifiant','notes','statut'
                        ];

    public const TYPES = ['particulier', 'entreprise'];
    public const STATUTS = ['actif', 'inactif'];

    public function dossiers() {
        return $this->hasMany(Dossier::class, 'idCl', 'idClient');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dossier extends Model {
    use HasFactory;
    protected $primaryKey="idDossier";
    protected $fillable=[
        'nomDossier','titre','numero_dossier',
        'idAv','assigned_user_id','idCl','idCa',
        'dateDossier','date_fermeture','etat','statut','priorite','description',
    ];

    public const STATUTS = ['nouveau', 'en_cours', 'en_attente', 'suspendu', 'cloture', 'archive'];
    public const PRIORITES = ['basse', 'normale', 'haute', 'urgente'];

    public function client() {
        return $this->belongsTo(Client::class, 'idCl', 'idClient');
    }

    public function avocat() {
        return $this->belongsTo(Avocat::class, 'idAv', 'idAvocat');
    }

    public function assignedUser() {
        return $this->belongsTo(User::class, 'assigned_user_id', 'id');
    }

    public function cas() {
        return $this->belongsTo(Cas::class, 'idCa', 'idCas');
    }
}

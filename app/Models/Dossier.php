<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dossier extends Model {
    use HasFactory;
    protected $primaryKey="idDossier";
    protected $fillable=['nomDossier','idAv','idCl','idCa','dateDossier','etat','description'];
    public function client() {
        return $this->hasMany(Client::class, 'id_Cl');
    }
}

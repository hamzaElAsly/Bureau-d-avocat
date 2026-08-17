<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Audience extends Model
{
    use HasFactory;
    protected $primaryKey="idAudience";

    public function dossier()
    {
        return $this->belongsTo(Dossier::class, 'id_Dossier', 'idDossier');
    }

    public function tribunal()
    {
        return $this->belongsTo(Tribunal::class, 'id_Tribunal', 'idTribunal');
    }
}

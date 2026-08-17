<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Avocat extends Model
{
    use HasFactory;
    protected $primaryKey='idAvocat';
    protected $fillable = ['idAvocat', 'nomAvocat', 'prenomAvocat', 'telAvocat', 'emailAvocat', 'passAvocat', 'specialiste', 'imageAvocat'];

    public function dossiers()
    {
        return $this->hasMany(Dossier::class, 'idAv', 'idAvocat');
    }
}

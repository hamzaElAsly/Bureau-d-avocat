<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Avocat extends Model
{
    use HasFactory;
    protected $primaryKey='idAvocat';
    
    // public function dossier(){
    //     return $this->hasMany(Dossier::class,'avocat_id','idAvocat');
    // }
}

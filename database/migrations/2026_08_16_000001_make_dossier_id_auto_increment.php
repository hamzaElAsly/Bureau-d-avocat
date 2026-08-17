<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * The original schema declared idDossier as a primary key but omitted
     * AUTO_INCREMENT, which made normal Eloquent creates fail on MySQL.
     */
    public function up(): void
    {
        Schema::table('dossiers', function (Blueprint $table) {
            $table->unsignedBigInteger('idDossier', true)->change();
        });
    }

    public function down(): void
    {
        Schema::table('dossiers', function (Blueprint $table) {
            $table->unsignedBigInteger('idDossier')->change();
        });
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up(): void
    {
        Schema::disableForeignKeyConstraints();
        Schema::create('dossiers', function (Blueprint $table) {
            $table->unsignedBigInteger('idDossier')->primary();
            $table->string('nomDossier');
            $table->foreignId('idAv')->references('idAvocat')->on('avocats')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('idCl')->references('idClient')->on('clients')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('idCa')->references('idCas')->on('cas')->cascadeOnDelete()->cascadeOnUpdate();
            $table->date('dateDossier');
            $table->enum('etat', ['en cours', 'close']);
            $table->string('description');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('dossiers');
        Schema::enableForeignKeyConstraints();
    }
};

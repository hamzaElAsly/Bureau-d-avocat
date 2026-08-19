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
            $table->unsignedBigInteger('idDossier')->autoIncrement();
            $table->string('numero_dossier')->nullable()->unique();
            $table->string('nomDossier');
            $table->string('titre')->nullable();
            $table->foreignId('idAv')->nullable()->references('idAvocat')->on('avocats')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('idCl')->references('idClient')->on('clients')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('idCa')->nullable()->references('idCas')->on('cas')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('assigned_user_id')->nullable()->constrained('users')->nullOnDelete();
            $table->date('dateDossier');
            $table->date('date_fermeture')->nullable();
            $table->enum('etat', ['en cours', 'close']);
            $table->string('statut')->default('nouveau');
            $table->string('priorite')->default('normale');
            $table->string('description')->nullable();
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

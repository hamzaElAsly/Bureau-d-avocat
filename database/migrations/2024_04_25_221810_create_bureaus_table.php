<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::disableForeignKeyConstraints();
        Schema::create('bureaus', function (Blueprint $table) {
            $table->unsignedBigInteger('idBureau')->primary();
            $table->string('nomBureau');
            $table->string('adresseBureau');
            $table->foreignId('idAv')->references('idAvocat')->on('avocats')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('idCL')->references('idClient')->on('clients')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('idDoss')->references('idDossier')->on('dossiers')->cascadeOnDelete()->cascadeOnUpdate();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('bureaus');
        Schema::enableForeignKeyConstraints();
    }
};

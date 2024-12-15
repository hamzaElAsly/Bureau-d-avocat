<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {   
        Schema::disableForeignKeyConstraints();
        Schema::create('audiences', function (Blueprint $table) {
            $table->unsignedBigInteger('idAudience')->primary();
            $table->foreignId('id_Dossier')->references('idDossier')->on('dossiers')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('id_Tribunal')->references('idTribunal')->on('tribunals')->cascadeOnDelete()->cascadeOnUpdate();
            $table->date('dateAudience');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('audiences');
        Schema::enableForeignKeyConstraints();
    }
};

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
        Schema::create('clients', function (Blueprint $table) {
            $table->bigIncrements('idClient');
            $table->string('nomClient');
            $table->string('prenomClient');
            $table->string('type_client')->default('particulier');
            $table->string('emailClient');
            $table->string('identifiant', 100)->nullable();
            $table->string('adressClient');
            $table->text('notes')->nullable();
            $table->string('statut')->default('actif');
            $table->integer('tel1')->nullable();
            $table->integer('tel2')->nullable();
            $table->string('imageClient')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('clients');
        Schema::enableForeignKeyConstraints();
    }
};

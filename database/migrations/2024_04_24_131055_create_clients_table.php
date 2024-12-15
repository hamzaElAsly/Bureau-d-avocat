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
            $table->unsignedBigInteger('idClient')->primary()->autoIncrement();
            $table->string('nomClient');
            $table->string('prenomClient');
            $table->string('emailClient');
            $table->string('adressClient');
            $table->integer('tel1');
            $table->integer('tel2');
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

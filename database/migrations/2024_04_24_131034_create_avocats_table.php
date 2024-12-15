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
        Schema::create('avocats', function (Blueprint $table) {
            $table->unsignedBigInteger('idAvocat')->primary();
            $table->string('nomAvocat');
            $table->string('prenomAvocat');
            $table->integer('telAvocat');
            $table->string('emailAvocat');
            $table->string('passAvocat');
            $table->string('specialiste');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('avocats');
        Schema::enableForeignKeyConstraints();
    }
};

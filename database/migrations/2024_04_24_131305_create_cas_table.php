<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void{
        Schema::disableForeignKeyConstraints();
        Schema::create('cas', function (Blueprint $table) {
            $table->unsignedBigInteger('idCas')->primary();
            $table->string('listeCas');
            $table->timestamps();
        });
    }
    
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('cas');
        Schema::enableForeignKeyConstraints();
    }
};

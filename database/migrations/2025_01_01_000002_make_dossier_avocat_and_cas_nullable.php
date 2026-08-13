<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Rend optionnels l'avocat (idAv) et le type d'affaire (idCa) sur un dossier.
     * La responsabilité peut désormais être portée par un User (assigned_user_id).
     * Les dossiers existants conservent leur valeur ; seuls les futurs dossiers
     * peuvent omettre ces champs.
     */
    public function up(): void
    {
        Schema::table('dossiers', function (Blueprint $table) {
            $table->unsignedBigInteger('idAv')->nullable()->change();
            $table->unsignedBigInteger('idCa')->nullable()->change();
            $table->string('description')->nullable()->change();
        });
    }

    public function down(): void
    {
        Schema::table('dossiers', function (Blueprint $table) {
            $table->unsignedBigInteger('idAv')->nullable(false)->change();
            $table->unsignedBigInteger('idCa')->nullable(false)->change();
            $table->string('description')->nullable(false)->change();
        });
    }
};

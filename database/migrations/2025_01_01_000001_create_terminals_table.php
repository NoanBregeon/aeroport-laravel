<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Assure un état propre (utile en dev/tests) : supprime la table si elle existe
        Schema::dropIfExists('terminals');

        Schema::create('terminals', function (Blueprint $table): void {
            $table->id();
            $table->string('nom');
            $table->string('code'); // IMPORTANT : ajout du champ code
            $table->string('emplacement');
            $table->date('date_mise_en_service');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('terminals');
    }
};

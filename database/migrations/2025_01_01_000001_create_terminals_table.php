<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Assure un état propre : supprime la table si elle existe (utile en tests SQLite ré-exécutés)
        Schema::dropIfExists('terminals');

        Schema::create('terminals', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('code')->nullable()->unique();
            $table->string('emplacement')->nullable();
            $table->date('date_mise_en_service')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('terminals');
    }
};

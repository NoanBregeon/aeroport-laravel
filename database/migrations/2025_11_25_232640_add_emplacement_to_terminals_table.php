<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('terminals', function (Blueprint $table) {
            // On ajoute seulement si la colonne n'existe pas déjà (au cas où)
            if (!Schema::hasColumn('terminals', 'emplacement')) {
                $table->string('emplacement')->after('code');
            }
        });
    }

    public function down(): void
    {
        Schema::table('terminals', function (Blueprint $table) {
            if (Schema::hasColumn('terminals', 'emplacement')) {
                $table->dropColumn('emplacement');
            }
        });
    }
};

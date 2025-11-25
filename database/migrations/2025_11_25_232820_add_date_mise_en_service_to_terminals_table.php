<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('terminals', function (Blueprint $table) {
            if (!Schema::hasColumn('terminals', 'date_mise_en_service')) {
                $table->date('date_mise_en_service')->nullable()->after('emplacement');
            }
        });
    }

    public function down(): void
    {
        Schema::table('terminals', function (Blueprint $table) {
            if (Schema::hasColumn('terminals', 'date_mise_en_service')) {
                $table->dropColumn('date_mise_en_service');
            }
        });
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('terminals', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
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

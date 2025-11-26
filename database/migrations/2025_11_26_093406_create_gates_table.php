<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('gates', function (Blueprint $table) {
            $table->id();
            $table->foreignId('hall_id')->constrained()->cascadeOnDelete();
            $table->string('nom');
            $table->boolean('is_open')->default(false);
            $table->integer('capacite_max');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('gates');
    }
};

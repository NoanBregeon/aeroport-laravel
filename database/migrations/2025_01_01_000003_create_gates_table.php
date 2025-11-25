<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('gates', function (Blueprint $table): void {
            $table->id();
            $table->foreignId('hall_id')
                ->constrained('halls')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->string('nom');
            $table->boolean('ouverte')->default(false);
            $table->unsignedInteger('capacite_max');
            $table->unsignedInteger('capacite');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('gates');
    }
};

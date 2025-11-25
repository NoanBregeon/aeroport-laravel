<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('halls', function (Blueprint $table): void {
            $table->id();
            $table->foreignId('terminal_id')
                ->constrained('terminals')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->string('nom');
            $table->unsignedInteger('personnel_minimum');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('halls');
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('race_statistics', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pilot_id')->constrained('pilots');
            $table->foreignId('race_id')->constrained('races');
            $table->float('best_lap');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('races_statistics');
    }
};

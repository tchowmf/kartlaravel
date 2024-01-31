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
            $table->foreignId('kart_id')->constrained('karts');
            $table->foreignId('pilot_id')->constrained('pilots');
            $table->foreignId('racetrack_id')->constrained('racetracks');
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

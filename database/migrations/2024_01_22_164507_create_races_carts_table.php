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
        Schema::create('races_carts', function (Blueprint $table) {
            $table->foreignId('race_id')->constrained('races');
            $table->foreignId('kart_id')->constrained('karts');
            $table->foreignId('pilot_id')->constrained('pilots');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('races_carts');
    }
};

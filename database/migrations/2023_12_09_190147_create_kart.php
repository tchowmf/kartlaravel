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
        Schema::create('kart', function (Blueprint $table) {
            $table->id();
            $table->integer('numKart')->nullable(false);
            $table->string('mediaTempo')->nullable(true);
            $table->integer('numVoltas')->nullable(true);
            $table->char('notaKart')->nullable(true);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kart');
    }
};

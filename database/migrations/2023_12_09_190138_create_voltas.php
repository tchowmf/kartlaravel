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
        Schema::create('voltas', function (Blueprint $table) {
            $table->id();
            $table->integer('numKart')->nullable(false);
            $table->string('nomePiloto')->nullable(false);
            $table->float('melhorVolta')->nullable(false);
            $table->char('notaPiloto', 1)->nullable(true);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('voltas');
    }
};

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
        Schema::table('nav', function (Blueprint $table) {
            Schema::dropIfExists('nav');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('nav', function (Blueprint $table) {
            $table->id();
            $table->longText("contenido");
            $table->json("links");
            $table->json("botones");
            $table->timestamps();
        });
    }
};

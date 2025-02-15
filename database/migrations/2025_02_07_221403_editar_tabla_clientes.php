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
        Schema::table('clientes', function (Blueprint $table) {
            $table->ipAddress("ip")->nullable();
            $table->dropcolumn("nombre");
            $table->dropcolumn("celular");
            $table->string('ubicacion')->nullable()->change();
            $table->integer('edad')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('clientes', function (Blueprint $table) {
            $table->dropColumn("ip"); 

            $table->string("nombre"); 
            $table->string("celular");
    
            $table->string('ubicacion')->nullable(false)->change();
            $table->integer('edad')->nullable(false)->change();
        });
    }
};

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
        Schema::table('paginas', function (Blueprint $table) {
            $table->dropColumn("header_id");
            $table->dropColumn("footer_id");
            $table->dropColumn("nav_id");
            $table->dropColumn("aside_id");
            $table->dropColumn("section_id");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('paginas', function (Blueprint $table) {
            $table->integer("header_id");
            $table->integer("nav_id");
            $table->integer("aside_id");
            $table->integer("footer_id");
            $table->integer("section_id");
        });
    }
};

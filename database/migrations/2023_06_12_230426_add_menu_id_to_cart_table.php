<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * @return void
     */
    public function up(): void
    {
        Schema::table('cart', function (Blueprint $table) {
            $table->foreignId('menu_id')->after('id')->constrained('menu');
        });
    }

    /**
     * Reverse the migrations.
     * @return void
     */
    public function down(): void
    {
        Schema::table('cart', function (Blueprint $table) {
            //
            $table->dropColumn('menu_id');
        });
    }
};

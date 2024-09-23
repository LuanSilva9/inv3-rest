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
        Schema::create('investiment', function (Blueprint $table) {
            $table->id();
            $table->string('name_investiment');
            $table->unsignedBigInteger('current_investiment');
            $table->unsignedBigInteger('session_id');
            $table->string('default_color');
            $table->string('default_icon');

            $table->foreign('session_id')->references('session_id')->on('session');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('investiment');
    }
};

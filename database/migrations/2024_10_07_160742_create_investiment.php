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
            $table->unsignedBigInteger("user_id");
            $table->string('default_color')->default("#ccc");
            $table->string('default_icon')->default("FaCoins");
            
            $table->foreign('session_id')->references('session_id')->on('session');
            $table->foreign("user_id")->references("id")->on("users");
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

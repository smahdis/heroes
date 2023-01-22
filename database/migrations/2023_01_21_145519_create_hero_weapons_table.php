<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hero_weapons', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('hero_id');
            $table->foreign('hero_id')->references('id')->on('heroes')->onDelete('cascade');
            $table->unsignedBigInteger('weapon_id');
            $table->foreign('weapon_id')->references('id')->on('weapons')->onDelete('cascade');
            $table->unique(["hero_id", "weapon_id"], 'hero_weapon_unique');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hero_weapons');
    }
};

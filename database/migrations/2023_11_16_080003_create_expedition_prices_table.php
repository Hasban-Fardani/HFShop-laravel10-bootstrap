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
        Schema::create('expedition_prices', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("price");
            $table->unsignedBigInteger("expedition_id");
            $table->unsignedBigInteger("city_from_id")->comment("from city");
            $table->unsignedBigInteger("city_to_id")->comment("to city");
            $table->foreign("expedition_id")->references("id")->on("expeditions");
            $table->foreign("city_from_id")->references("id")->on("cities");
            $table->foreign("city_to_id")->references("id")->on("cities");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('expedition_prices');
    }
};

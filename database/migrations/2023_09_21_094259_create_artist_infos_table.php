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
        Schema::create('artist_infos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->text("naam");
            $table->text("bandleden");
            $table->text("genre");
//            $table->unsignedBigInteger("platenmaatschappijen_id");
//            $table->foreign("platenmaatschappijen_id")->references("id")->on("platenmaatschappijen")

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('artist_infos');
    }
};

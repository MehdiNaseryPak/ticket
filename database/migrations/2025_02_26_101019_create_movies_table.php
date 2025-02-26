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
        Schema::create('movies', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('cat_id');
            $table->text('image');
            $table->text('background')->nullable();
            $table->string('description');
            $table->tinyInteger('status')->default(0);
            $table->string('genre');
            $table->string('director');
            $table->text('trailer');
            $table->tinyInteger('commentable')->default(0);
            $table->bigInteger('count')->default(0);
            $table->string('time');
            $table->timestamps();

            $table->foreign('cat_id')->references('id')->on('categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movies');
    }
};

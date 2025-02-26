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
        Schema::create('sans_subs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sans_id');
            $table->string('time');
            $table->string('price');
            $table->timestamps();
            $table->foreign('sans_id')->references('id')->on('sans')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sans_subs');
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('packages', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->string('destination');
            $table->integer('duration');
            $table->decimal('price', 10, 2);
            $table->integer('max_participants');
            $table->time('start_time');
            $table->json('itinerary');
            $table->json('inclusions');
            $table->json('images');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('packages');
    }
}; 
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
        Schema::create('reservations', function (Blueprint $table) {
            $table->unsignedBigInteger('id')->autoIncrement();
            $table->date('screening_date');
            $table->foreignId('schedule_id')->constrained('schedules')->cascadeOnDelete()->nullable();
            $table->foreignId('sheet_id')->constrained('sheets')->cascadeOnDelete()->nullable();
            $table->string('email');
            $table->string('name');
            $table->timestamps();

            $table->unique(['schedule_id', 'sheet_id']);


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reservations');
    }
};

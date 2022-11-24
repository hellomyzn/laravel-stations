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
        Schema::create('screen_schedules', function (Blueprint $table) {
            $table->id();
            $table->foreignId('screen_id')->constrained('screens')->cascadeOnDelete();
            $table->foreignId('schedule_id')->constrained('schedules')->cascadeOnDelete();
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
        Schema::dropIfExists('screen_schedules');
    }
};

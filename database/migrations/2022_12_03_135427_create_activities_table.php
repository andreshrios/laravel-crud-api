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
        Schema::create('activities', function (Blueprint $table) {
            $table->id();

            $table->string('consecutive')->unique();
            $table->string('activity_name');

            $table->bigInteger('monitor_id')->unsigned();
            $table->foreign('monitor_id')->references('id')->on('monitors')->onDelete('cascade');

            $table->bigInteger('cultural_right_id')->unsigned();
            $table->foreign('cultural_right_id')->references('id')->on('cultural_rights')->onDelete('cascade');

            $table->bigInteger('nac_id')->unsigned();
            $table->foreign('nac_id')->references('id')->on('nacs')->onDelete('cascade');

            $table->date('activity_date');
            $table->time('start_time');
            $table->time('final_hour');

            $table->bigInteger('expertise_id')->unsigned();
            $table->foreign('expertise_id')->references('id')->on('expertises')->onDelete('cascade');

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
        Schema::dropIfExists('activities');
    }
};

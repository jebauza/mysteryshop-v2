<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEstablishmentEvaluationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('establishment_evaluations', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->time('time');
            $table->text('comment');
            $table->string('employee_name');
            $table->unsignedBigInteger('indicator_id');
          
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
        Schema::dropIfExists('establishment_evaluations');
    }
}

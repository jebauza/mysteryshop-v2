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
            $table->unsignedBigInteger('establishment_id');
            $table->foreign('establishment_id')
                ->references('id')
                ->on('establishments');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')
                ->references('id')
                ->on('users');

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

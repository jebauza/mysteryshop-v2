<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEvaluationDepartmentValuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evaluation_department_values', function (Blueprint $table) {
            $table->id();
            $table->integer('value');
            $table->text('comment');
            $table->unsignedBigInteger('indicator_id');
            $table->foreign('indicator_id')
                ->references('id')
                ->on('indicators');
            $table->unsignedBigInteger('evaluations_id');
            $table->foreign('evaluations_id')
                ->references('id')
                ->on('department_evaluations');
            $table->unsignedBigInteger('survey_id');
            $table->foreign('survey_id')
                ->references('id')
                ->on('surveys');
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
        Schema::dropIfExists('evaluation_department_values');
    }
}

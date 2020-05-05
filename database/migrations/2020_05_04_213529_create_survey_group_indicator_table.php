<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSurveyGroupIndicatorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('survey_group_indicator', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('indicator_group_id');
            $table->foreign('indicator_group_id')
                ->references('id')
                ->on('indicator_groups');
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
        Schema::dropIfExists('survey_group_indicator');
    }
}

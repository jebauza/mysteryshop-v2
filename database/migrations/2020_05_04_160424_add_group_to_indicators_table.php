<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddGroupToIndicatorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('indicators', function (Blueprint $table) {
            $table->unsignedBigInteger('indicator_group_id')->nullable();
            $table->foreign('indicator_group_id')
                ->references('id')
                ->on('indicator_groups');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        Schema::table('indicators', function (Blueprint $table) {
            $table->dropForeign(['indicator_group_id']);
            $table->dropColumn('indicator_group_id');
        });
    }
}

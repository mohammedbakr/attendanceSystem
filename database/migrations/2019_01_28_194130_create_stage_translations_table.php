<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStageTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stage_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('stage_id')->unsigned();
            $table->string('name');
            $table->string('locale')->index();

            $table->unique(['stage_id', 'locale']);
            $table->foreign('stage_id')->references('id')->on('stages')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stage_translations');
    }
}

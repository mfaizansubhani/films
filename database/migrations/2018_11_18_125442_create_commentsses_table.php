<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentssesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commentsses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email');
            $table->text('comment');
            $table->integer('films_id')->unsigned();

            $table->timestamps();
        });

        Schema::table('commentsses',function ($table){
            $table->foreign('films_id')->references('id')->on('films')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        Schema::dropIfExists('commentsses');
        Schema::dropForeign(['films_id']);
    }
}

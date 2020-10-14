<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionTagPivotTable extends Migration
{
    public function up()
    {
        Schema::create('question_tag', function (Blueprint $table) {
            $table->unsignedInteger('question_id');
            $table->foreign('question_id', 'question_id_fk_2359894')->references('id')->on('questions')->onDelete('cascade');
            $table->unsignedInteger('tag_id');
            $table->foreign('tag_id', 'tag_id_fk_2359894')->references('id')->on('tags')->onDelete('cascade');
        });
    }
}

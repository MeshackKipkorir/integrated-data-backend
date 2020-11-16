<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBig4agendaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('big4agenda', function (Blueprint $table) {
          $table->id();
          $table->String('title');
          $table->text('excerpt');
          $table->string('article_link')->nullable();
          $table->string('image_link')->nullable();
          $table->LongText('content');
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
        Schema::dropIfExists('big4agenda');
    }
}

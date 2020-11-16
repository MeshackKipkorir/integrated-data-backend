<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('article', function (Blueprint $table) {
            $table->id();
            $table->string('title',355)->nullable();
            $table->LongText('excerpt')->nullable();
            // $table->longText('content');
            // $table->string('image')->nullable();
            $table->unsignedBigInteger('category_id')->nullable();

            $table->foreign('category_id')
                  ->references('id')
                  ->on('category')
                  ->onUpdate('cascade')
                  ->onDelete('set null');
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
        Schema::dropIfExists('article');
    }
}

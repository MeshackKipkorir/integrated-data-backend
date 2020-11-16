<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePsckjobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('psckjobs', function (Blueprint $table) {
            $table->id();
            $table->string('ministry');
            $table->string('advert_no');
            $table->string('department');
            $table->string('post');
            $table->string('job_group');
            $table->string('vacancies');
            $table->string('closing_date');
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
        Schema::dropIfExists('psckjobs');
    }
}

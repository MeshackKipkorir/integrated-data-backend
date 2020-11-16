<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTendersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tenders', function (Blueprint $table) {
            $table->id();
            $table->string('org_name')->nullable();
            $table->string('type')->nullable();
            $table->string('telephone')->nullable();
            $table->string('email')->nullable();
            $table->string('physical_address')->nullable();
            $table->string('posted_at')->nullable();
            $table->string('tender_id')->nullable();
            $table->string('tender_type')->nullable();
            $table->string('tender_title')->nullable();
            $table->string('tender_category')->nullable();
            $table->string('tender_ref_no')->nullable();
            $table->string('publication_date')->nullable();
            $table->string('tender_status')->nullable();
            $table->integer('org_id')->nullable();
            $table->integer('year')->nullable();
            $table->string('month')->nullable();
            $table->string('tender_code')->nullable();
            $table->string('closing_date')->nullable();
            $table->string('image')->nullable();
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
        Schema::dropIfExists('tenders');
    }
}

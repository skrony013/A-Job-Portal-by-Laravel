<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->string('position');
            $table->string('institute_name');
            $table->string('institute_logo');
            $table->string('institute_banner');
            // $table->string('job_cat');
            
            $table->foreignId("category_id")->constraint("categories")->onDelete("cascade");
            // $table->integer('category_id')->unsigned();
            
            $table->string('vacancy');
            $table->date('apply_start_at');
            $table->date('apply_end_at');
            $table->string('apply_fee');
            $table->string('salary');
            $table->string('circular');
            $table->string('apply_url');
            $table->longText('requirements');
            $table->string('job_status');
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
        Schema::dropIfExists('jobs');
    }
}

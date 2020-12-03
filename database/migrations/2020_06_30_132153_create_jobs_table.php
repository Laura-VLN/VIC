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
            $table->date('deadline')->nullable();
            $table->string('title');
            $table->string('type')->nullable();
            $table->string('location')->nullable();
            $table->text('description');
            $table->text('skills_needed')->nullable();
            $table->string('company')->nullable();
            $table->string('contact_people')->nullable();
            $table->string('email');
            $table->string('proximity');
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

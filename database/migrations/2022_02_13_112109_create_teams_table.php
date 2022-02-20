<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teams', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('job_title');
            $table->string('phone');
            $table->string('image')->nullable()->default('default-user.jpg');
            $table->string('twitter')->nullable()->default('');
            $table->string('facebook')->nullable()->default('');
            $table->string('linked_in')->nullable()->default('');
            $table->string('web')->nullable()->default('');
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
        Schema::dropIfExists('teams');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTreainersTable extends Migration
{
    public function up()
    {
        Schema::create('treainers', function (Blueprint $table) {
            $table->increments('id');

            $table->string('fullname');

            $table->longText('description');

            $table->integer('orderby');

            $table->boolean('status')->default(0)->nullable();

            $table->boolean('schedule_trainer')->default(0)->nullable();

            $table->timestamps();

            $table->softDeletes();
        });
    }
}

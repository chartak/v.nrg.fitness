<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTypeOfTrainersTable extends Migration
{
    public function up()
    {
        Schema::create('type_of_trainers', function (Blueprint $table) {
            $table->increments('id');

            $table->string('name');

            $table->longText('description')->nullable();

            $table->string('status')->nullable();

            $table->timestamps();

            $table->softDeletes();
        });
    }
}

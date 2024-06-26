<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicesTable extends Migration
{
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->increments('id');

            $table->string('name');

            $table->longText('description');

            $table->boolean('status')->default(0)->nullable();

            $table->integer('orderby');

            $table->boolean('special_offer')->default(0)->nullable();

            $table->boolean('timetable')->default(0)->nullable();

            $table->timestamps();

            $table->softDeletes();
        });
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClubCartsTable extends Migration
{
    public function up()
    {
        Schema::create('club_carts', function (Blueprint $table) {
            $table->increments('id');

            $table->string('name');

            $table->string('description');

            $table->string('timeto')->nullable();

            $table->string('timefrom')->nullable();

            $table->string('weekendfrom')->nullable();

            $table->string('weekendto')->nullable();

            $table->string('weekdaysfrom')->nullable();

            $table->string('weekdaysto')->nullable();

            $table->string('duration')->nullable();

            $table->integer('term')->nullable();

            $table->string('year_from')->nullable();

            $table->string('year_to')->nullable();

            $table->integer('orderby');

            $table->boolean('status')->default(0)->nullable();

            $table->string('cart_background')->nullable();

            $table->timestamps();

            $table->softDeletes();
        });
    }
}

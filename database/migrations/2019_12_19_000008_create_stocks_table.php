<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStocksTable extends Migration
{
    public function up()
    {
        Schema::create('stocks', function (Blueprint $table) {
            $table->increments('id');

            $table->string('name');

            $table->date('start_date');

            $table->date('end_date');

            $table->integer('orderby');

            $table->boolean('status')->default(0)->nullable();

            $table->integer('discounts')->nullable();

            $table->timestamps();

            $table->softDeletes();
        });
    }
}

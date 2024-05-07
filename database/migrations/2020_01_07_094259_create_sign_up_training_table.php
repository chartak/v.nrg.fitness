<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSignUpTrainingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sign_up_training', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('type_id');

            $table->string('type');

            $table->string('type_name');

            $table->string('full_name');

            $table->string('phone');

            $table->string('status')->default('new')->nullable();

            $table->timestamps();

            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sign_up_training');
    }
}

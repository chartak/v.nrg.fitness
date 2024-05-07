<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrainingScheduleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('training_schedules', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('service_id');

            $table->foreign('service_id', 'service_id_fk_755867')->references('id')->on('services')->onDelete('cascade');

            $table->string('day_of_week');

            $table->unsignedInteger('treainer_id');

            $table->foreign('treainer_id', 'treainer_id_fk_755868')->references('id')->on('treainers')->onDelete('cascade');

            $table->time('time');

            $table->string('training_name');

            $table->string('pay_type_training');

            $table->unsignedInteger('stock_id');

            $table->foreign('stock_id', 'stock_id_fk_755869')->references('id')->on('stocks')->onDelete('cascade');

            $table->unsignedInteger('branch_id')->nullable();

            $table->foreign('branch_id', 'branch_fk_755870')->references('id')->on('contact_contacts');

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
        Schema::dropIfExists('training_schedules');
    }
}

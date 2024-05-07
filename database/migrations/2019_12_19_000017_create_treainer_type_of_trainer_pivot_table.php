<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTreainerTypeOfTrainerPivotTable extends Migration
{
    public function up()
    {
        Schema::create('treainer_type_of_trainer', function (Blueprint $table) {
            $table->unsignedInteger('treainer_id');

            $table->foreign('treainer_id', 'treainer_id_fk_740624')->references('id')->on('treainers')->onDelete('cascade');

            $table->unsignedInteger('type_of_trainer_id');

            $table->foreign('type_of_trainer_id', 'type_of_trainer_id_fk_740624')->references('id')->on('type_of_trainers')->onDelete('cascade');
        });
    }
}

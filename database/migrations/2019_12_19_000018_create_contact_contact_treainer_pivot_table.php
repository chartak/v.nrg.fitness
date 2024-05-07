<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactContactTreainerPivotTable extends Migration
{
    public function up()
    {
        Schema::create('contact_contact_treainer', function (Blueprint $table) {
            $table->unsignedInteger('treainer_id');

            $table->foreign('treainer_id', 'treainer_id_fk_740625')->references('id')->on('treainers')->onDelete('cascade');

            $table->unsignedInteger('contact_contact_id');

            $table->foreign('contact_contact_id', 'contact_contact_id_fk_740625')->references('id')->on('contact_contacts')->onDelete('cascade');
        });
    }
}

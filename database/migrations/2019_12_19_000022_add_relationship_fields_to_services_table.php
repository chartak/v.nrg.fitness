<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToServicesTable extends Migration
{
    public function up()
    {
        Schema::table('services', function (Blueprint $table) {
            $table->unsignedInteger('branch_id');

            $table->foreign('branch_id', 'branch_fk_740647')->references('id')->on('contact_contacts');
        });
    }
}

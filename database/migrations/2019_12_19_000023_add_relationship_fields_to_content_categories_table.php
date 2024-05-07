<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToContentCategoriesTable extends Migration
{
    public function up()
    {
        Schema::table('content_categories', function (Blueprint $table) {
            $table->unsignedInteger('branch_id')->nullable();

            $table->foreign('branch_id', 'branch_fk_755860')->references('id')->on('contact_contacts');
        });
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToContentPagesTable extends Migration
{
    public function up()
    {
        Schema::table('content_pages', function (Blueprint $table) {
            $table->unsignedInteger('branch_id')->nullable();

            $table->foreign('branch_id', 'branch_fk_755862')->references('id')->on('contact_contacts');
        });
    }
}

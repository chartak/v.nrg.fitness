<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToClubCartsTable extends Migration
{
    public function up()
    {
        Schema::table('club_carts', function (Blueprint $table) {
            $table->unsignedInteger('branch_id');

            $table->foreign('branch_id', 'branch_fk_740637')->references('id')->on('contact_contacts');
        });
    }
}

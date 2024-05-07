<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactContactsTable extends Migration
{
    public function up()
    {
        Schema::create('contact_contacts', function (Blueprint $table) {
            $table->increments('id');

            $table->string('contact_phone_1')->nullable();

            $table->string('contact_phone_2')->nullable();

            $table->string('contact_email')->nullable();

            $table->string('contact_skype')->nullable();

            $table->string('contact_address')->nullable();

            $table->string('branch_name')->nullable();

            $table->string('contact_city')->nullable();

            $table->string('contact_fb')->nullable();

            $table->string('contact_ins')->nullable();

            $table->string('contact_tw')->nullable();

            $table->string('contact_vk')->nullable();

            $table->time('open_hour')->nullable();

            $table->time('close_hour')->nullable();

            $table->float('latitude', 15, 2)->nullable();

            $table->float('longitude', 15, 2)->nullable();

            $table->longText('description')->nullable();

            $table->string('head_script')->nullable();

            $table->string('body_script_top')->nullable();

            $table->string('body_script_bottom')->nullable();

            $table->timestamps();

            $table->softDeletes();
        });
    }
}

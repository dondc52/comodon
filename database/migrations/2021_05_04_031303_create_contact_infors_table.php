<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactInforsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contact_infors', function (Blueprint $table) {
            $table->id();
            $table->string('contact_address');
            $table->string('contact_address_des');
            $table->string('contact_phone');
            $table->string('contact_phone_des');
            $table->string('contact_email');
            $table->string('contact_email_des');
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
        Schema::dropIfExists('contact_infors');
    }
}

<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUseraccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('useraccounts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name_user');
            $table->string('position_user');
            $table->string('company_user');
            $table->string('email_user')->unique();
            $table->string('phone_user');
            $table->integer('group_user');
            $table->integer('status_user');
            $table->integer('status_email');
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
        Schema::drop('useraccounts');
    }
}

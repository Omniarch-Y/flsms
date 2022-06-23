<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('middle_name');
            $table->string('last_name');
            $table->string('dob');
            $table->string('age');
            $table->string('phone_number')->unique();
            $table->string('picture');
            $table->unsignedBigInteger('address_id');
            $table->foreign('address_id')->references('id')->on('addresses')->onDelete('cascade')->onUpdate('cascade');
            $table->string('nationality');
            $table->string('business_type');
            $table->unsignedBigInteger('group_id')->nullable();
            $table->foreign('group_id')->references('id')->on('group_customers')->onDelete('cascade')->onUpdate('cascade');
            $table->string('password')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customers');
    }
};

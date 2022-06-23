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
        Schema::create('loans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cust_id');
            $table->foreign('cust_id')->references('id')->on('customers')->onDelete('cascade')->onUpdate('cascade');
            $table->string('collateral');
            $table->string('interest_rate');
            $table->string('service_charge');
            $table->string('amount');
            $table->string('net_amount');
            $table->string('penalty_rate');
            $table->boolean('status')->default(0);
            $table->string('starting_date');
            $table->string('ending_date');      
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('loans');
    }
};

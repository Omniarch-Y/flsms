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
            $table->Integer('interest_rate');
            $table->Integer('service_charge')->nullable();
            $table->unsignedBigInteger('amount');
            $table->unsignedBigInteger('net_amount')->nullable();
            $table->Integer('penalty_rate')->nullable();
            $table->boolean('status')->default(0);
            $table->date('starting_date');
            $table->date('ending_date');      
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('insurance')->nullable();
            $table->foreign('insurance')->references('id')->on('insurances')->onDelete('cascade')->onUpdate('cascade');
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

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
            $table->string('loan_type');
            $table->float('amount');
            $table->float('service_charge');
            $table->float('net_amount')->nullable();
            $table->float('total_debt')->nullable();
            $table->float('penalty_rate')->nullable();
            $table->boolean('status')->default(0);
            $table->date('starting_date');
            $table->date('ending_date');
            $table->date('interest_date');
            $table->unsignedBigInteger('coll_id');
            $table->foreign('coll_id')->references('id')->on('collaterals')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('int_id')->nullable();
            $table->foreign('int_id')->references('id')->on('interests')->onDelete('set null')->onUpdate('cascade');      
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('insu_id')->nullable();
            $table->foreign('insu_id')->references('id')->on('insurances')->onDelete('set null')->onUpdate('cascade');
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

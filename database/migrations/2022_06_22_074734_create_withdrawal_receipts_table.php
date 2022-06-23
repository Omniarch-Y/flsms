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
        Schema::create('withdrawal_receipts', function (Blueprint $table) {
            $table->id();
            $table->string('amount');
            $table->unsignedBigInteger('loan_id');
            $table->foreign('loan_id')->references('id')->on('loans')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**image.png
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('withdrawal_receipts');
    }
};

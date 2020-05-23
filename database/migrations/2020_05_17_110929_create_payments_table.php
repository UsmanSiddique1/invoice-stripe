<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->string('zip');
            $table->string('city');
            $table->string('state');
            $table->string('status')->nullable();
            $table->integer('amount')->nullable();
            $table->string('billing_account_number');
            $table->string('EX')->nullable();
            $table->string('Invoice')->nullable();
            $table->string('service_name');
            $table->integer('service_price');
            $table->integer('total_amount');
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
        Schema::dropIfExists('payments');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('account_id_from');
            $table->unsignedInteger('account_id_to');
            $table->double('amount', 8, 2);
            $table->dateTime('date', $precision = 0);
            $table->string('description')->nullable();
            $table->timestamps();
            $table->foreign('account_id_from')->references('id')->on('accounts');
            $table->foreign('account_id_to')->references('id')->on('accounts');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transactions');
    }
}
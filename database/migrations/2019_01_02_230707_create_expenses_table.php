<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExpensesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expenses', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->date('expense_date');
            $table->unsignedTinyInteger('expense_day'); // Monday = 1, Sunday = 7
            $table->unsignedTinyInteger('day_of_month'); // 1-30/31. For Feb: 1-28/29
            $table->unsignedTinyInteger('expense_month'); // January = 1, December = 12
            $table->unsignedSmallInteger('expense_year'); // Four digit year
            $table->unsignedInteger('payee_id');
            $table->string('expense_code', 4);
            $table->unsignedInteger('amount');
            $table->timestamps();
            $table->foreign('expense_code')->references('code')->on('categories');
            $table->foreign('payee_id')->references('id')->on('contacts');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('expenses');
    }
}

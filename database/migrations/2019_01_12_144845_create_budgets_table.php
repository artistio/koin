<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBudgetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('budgets', function (Blueprint $table) {
          $table->increments('id');
          $table->unsignedInteger('user_id');
          $table->string('budget_code', 20)->unique(); // YYYYMM-ExpenseCode
          $table->unsignedTinyInteger('budget_month'); // January = 1, December = 12
          $table->unsignedSmallInteger('budget_year'); // Four digit year
          $table->string('expense_code', 4);
          $table->unsignedInteger('amount');
          $table->timestamps();
          $table->foreign('expense_code')->references('code')->on('categories');
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
        Schema::dropIfExists('budgets');
    }
}

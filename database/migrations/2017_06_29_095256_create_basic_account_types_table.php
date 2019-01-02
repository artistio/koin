<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\BasicAccountType;

class CreateBasicAccountTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('basic_account_types', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 20);
            $table->timestamps();
        });

		// Inserting the Basic Account Type
		$basicAccountTypeList = array('Asset', 'Liability', 'Income', 'Expenses', 'Equity');

		foreach ($basicAccountTypeList as $basicAccountTypeName) {
			$basicAccountTypeRecord = new BasicAccountType;
			$basicAccountTypeRecord->name = $basicAccountTypeName;
			$basicAccountTypeRecord->save();
		}
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('basic_account_types');
    }
}

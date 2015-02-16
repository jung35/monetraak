<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMoneyAmountTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('money_amount', function(Blueprint $table)
        {
            $table->increments('id');
            $table->boolean('type');
            $table->integer('money_id')->unsigned();
            $table->foreign('money_id')->references('id')->on('money');
            $table->float('amount');
            $table->mediumText('description');
            $table->softDeletes();
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
        Schema::drop('money_amount');
    }

}

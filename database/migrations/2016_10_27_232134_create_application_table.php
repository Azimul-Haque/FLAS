<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApplicationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applications', function (Blueprint $table) {
            $table->increments('id');
            $table->string('company_name');
            $table->string('email')->unique();
            $table->string('phone'); 
            $table->string('owner');
            $table->string('chairman');
            $table->string('ceo');
            $table->string('address');
            $table->integer('employees')->unsigned();
            $table->string('estd');
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
        //
    }
}

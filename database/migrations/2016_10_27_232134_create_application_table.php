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
            $table->integer('created_by_id')->unsigned();
            $table->integer('application_status_id')->unsigned();
            $table->string('tracking_number')->unique();
            $table->integer('is_editable')->unsigned();
            $table->string('company_name');
            $table->string('email')->unique();
            $table->string('phone'); 
            $table->string('owner');
            $table->string('chairman');
            $table->string('ceo');
            $table->string('address');
            $table->integer('employees')->unsigned();
            $table->string('estd');
            $table->string('image')->nullable(); 
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
        Schema::drop('applications');
    }
}

<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Inspections extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inspections', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('applications_id')->unsigned();

            $table->string('check_company_name')->nullable();
            $table->string('initial_company_name')->nullable();

            $table->string('check_email')->nullable();
            $table->string('initial_email')->nullable();

            $table->string('check_phone')->nullable(); 
            $table->string('initial_phone')->nullable();

            $table->string('check_owner')->nullable();
            $table->string('initial_owner')->nullable();

            $table->string('check_chairman')->nullable();
            $table->string('initial_chairman')->nullable();

            $table->string('check_ceo')->nullable();
            $table->string('initial_ceo')->nullable();

            $table->string('check_address')->nullable();
            $table->string('initial_address')->nullable();

            $table->string('check_employees')->nullable();
            $table->string('initial_employees')->nullable();

            $table->string('check_estd')->nullable();
            $table->string('initial_estd')->nullable();

            $table->string('check_image')->nullable(); 
            $table->string('initial_image')->nullable(); 

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
        Schema::drop('inspections');
    }
}

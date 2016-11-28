<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCollumnsToApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('applications', function($table) {
            $table->integer('area')->unsigned()->after('employees'); 
            $table->integer('fire_extinguisher')->unsigned()->after('area'); 
            $table->string('fire_extinguisher_exp_date')->nullable()->after('fire_extinguisher'); 
            $table->integer('rod_breaker')->unsigned()->after('fire_extinguisher_exp_date'); 
            $table->integer('emergency_exit')->after('rod_breaker'); 
            $table->integer('storey')->unsigned()->after('emergency_exit'); 
            $table->integer('nearest_buildings')->unsigned()->after('storey'); 
        }); 
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('applications', function($table) {
            $table->dropColumn('area'); 
            $table->dropColumn('fire_extinguisher'); 
            $table->dropColumn('fire_extinguisher_exp_date'); 
            $table->dropColumn('rod_breaker'); 
            $table->dropColumn('emergency_exit'); 
            $table->dropColumn('storey'); 
            $table->dropColumn('nearest_buildings'); 
        });
    }
}

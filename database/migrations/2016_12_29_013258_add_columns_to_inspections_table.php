<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsToInspectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('inspections', function($table) {
            $table->string('check_area')->nullable();
            $table->string('initial_area')->nullable();
            $table->string('check_fire_extinguisher')->nullable();
            $table->string('initial_fire_extinguisher')->nullable();
            $table->string('check_fire_extinguisher_exp_date')->nullable();
            $table->string('initial_fire_extinguisher_exp_date')->nullable();
            $table->string('check_rod_breaker')->nullable();
            $table->string('initial_rod_breaker')->nullable();
            $table->string('check_emergency_exit')->nullable();
            $table->string('initial_emergency_exit')->nullable();
            $table->string('check_storey')->nullable();
            $table->string('initial_storey')->nullable();
            $table->string('check_nearest_buildings')->nullable();
            $table->string('initial_nearest_buildings')->nullable();
            $table->string('check_layoutplan')->nullable();
            $table->string('initial_layoutplan')->nullable();
            $table->string('check_ownershipdocument')->nullable();
            $table->string('initial_ownershipdocument')->nullable();
            $table->string('check_tradelicense')->nullable();
            $table->string('initial_tradelicense')->nullable();
            $table->string('check_tinpaper')->nullable();
            $table->string('initial_tinpaper')->nullable();
            $table->string('check_bankcertificate')->nullable();
            $table->string('initial_bankcertificate')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('inspections', function($table) {
            $table->dropColumn('check_area');
            $table->dropColumn('initial_area');
            $table->dropColumn('check_fire_extinguisher');
            $table->dropColumn('initial_fire_extinguisher');
            $table->dropColumn('check_fire_extinguisher_exp_date');
            $table->dropColumn('initial_fire_extinguisher_exp_date');
            $table->dropColumn('check_rod_breaker');
            $table->dropColumn('initial_rod_breaker');
            $table->dropColumn('check_emergency_exit');
            $table->dropColumn('initial_emergency_exit');
            $table->dropColumn('check_storey');
            $table->dropColumn('initial_storey');
            $table->dropColumn('check_nearest_buildings');
            $table->dropColumn('initial_nearest_buildings');
            $table->dropColumn('check_layoutplan');
            $table->dropColumn('initial_layoutplan');
            $table->dropColumn('check_ownershipdocument'); 
            $table->dropColumn('initial_ownershipdocument');
            $table->dropColumn('check_tradelicense');
            $table->dropColumn('initial_tradelicense');
            $table->dropColumn('check_tinpaper');
            $table->dropColumn('initial_tinpaper');
            $table->dropColumn('check_bankcertificate');
            $table->dropColumn('initial_bankcertificate');
        });
    }
}

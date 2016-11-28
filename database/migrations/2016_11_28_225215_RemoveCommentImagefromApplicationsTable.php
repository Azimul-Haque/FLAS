<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RemoveCommentImagefromApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('applications', function($table) {
            $table->dropColumn('image');
            $table->string('layoutplan')->nullable()->after('estd'); 
            $table->string('ownershipdocument')->nullable()->after('layoutplan'); 
            $table->string('tradelicense')->nullable()->after('ownershipdocument'); 
            $table->string('tinpaper')->nullable()->after('tradelicense'); 
            $table->string('bankcertificate')->nullable()->after('tinpaper'); 
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
            $table->string('image');
        });
    }
}

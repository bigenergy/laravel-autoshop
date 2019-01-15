<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddIsEnabledSortToProps extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('props', function (Blueprint $table) {
            $table->boolean('is_enabled');
            $table->integer('sort');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('props', function (Blueprint $table) {
            $table->dropColumn('is_enabled');
            $table->dropColumn('sort');
        });
    }
}

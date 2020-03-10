<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipsToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->integer('unit_id')->unsigned()->change();
            $table->foreign('unit_id')->references('unit_id')->on('units')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign('users_unit_id_foreign');
        });
        Schema::table('users', function (Blueprint $table) {
            $table->dropIndex('users_unit_id_foreign');
        });
        Schema::table('users', function (Blueprint $table) {
            $table->integer('unit_id')->change();
        });
    }
}

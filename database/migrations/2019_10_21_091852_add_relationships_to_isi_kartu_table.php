<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipsToIsiKartuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('isi_kartu', function (Blueprint $table) {
            $table->integer('kartu_kendali_id')->unsigned()->change();
            $table->foreign('kartu_kendali_id')->references('kartu_kendali_id')->on('kartu_kendali')->onDelete('cascade');
            // $table->integer('unit_id')->unsigned()->change();
            // $table->foreign('unit_id')->references('unit_id')->on('units')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('isi_kartu', function (Blueprint $table) {
            $table->dropForeign('isi_kartu_kartu_kendali_id_foreign');
        });
        Schema::table('isi_kartu', function (Blueprint $table) {
            $table->dropIndex('isi_kartu_kartu_kendali_id_foreign');
        });
        Schema::table('isi_kartu', function (Blueprint $table) {
            $table->integer('kartu_kendali_id')->change();
        });
        Schema::table('isi_kartu', function (Blueprint $table) {
            $table->dropForeign('isi_kartu_unit_id_foreign');
        });
        Schema::table('isi_kartu', function (Blueprint $table) {
            $table->dropIndex('isi_kartu_unit_id_foreign');
        });
        Schema::table('isi_kartu', function (Blueprint $table) {
            $table->integer('unit_id')->change();
        });
    }
}

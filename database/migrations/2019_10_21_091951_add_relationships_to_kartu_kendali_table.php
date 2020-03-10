<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipsToKartuKendaliTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('kartu_kendali', function (Blueprint $table) {
            $table->integer('jenis_surat_id')->unsigned()->change();
            $table->foreign('jenis_surat_id')->references('jenis_surat_id')->on('jenis_surat')->onDelete('restrict');

            $table->integer('klasifikasi_dokumen_id')->unsigned()->change();
            $table->foreign('klasifikasi_dokumen_id')->references('klasifikasi_dokumen_id')->on('klasifikasi_dokumen')->onDelete('restrict');

            $table->integer('lokasi_kartu_id')->unsigned()->change();
            $table->foreign('lokasi_kartu_id')->references('lokasi_kartu_id')->on('lokasi_kartu')->onDelete('restrict');

            $table->integer('unit_id')->unsigned()->change();
            $table->foreign('unit_id')->references('unit_id')->on('units')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('kartu_kendali', function (Blueprint $table) {
            $table->dropForeign('kartu_kendali_jenis_surat_id_foreign');
        });
        Schema::table('kartu_kendali', function (Blueprint $table) {
            $table->dropIndex('kartu_kendali_jenis_surat_id_foreign');
        });
        Schema::table('kartu_kendali', function (Blueprint $table) {
            $table->integer('jenis_surat_id')->change();
        });
        Schema::table('kartu_kendali', function (Blueprint $table) {
            $table->dropForeign('kartu_kendali_klasifikasi_dokumen_id_foreign');
        });
        Schema::table('kartu_kendali', function (Blueprint $table) {
            $table->dropIndex('kartu_kendali_klasifikasi_dokumen_id_foreign');
        });
        Schema::table('kartu_kendali', function (Blueprint $table) {
            $table->integer('klasifikasi_dokumen_id')->change();
        });
        Schema::table('kartu_kendali', function (Blueprint $table) {
            $table->dropForeign('kartu_kendali_lokasi_kartu_id_foreign');
        });
        Schema::table('kartu_kendali', function (Blueprint $table) {
            $table->dropIndex('kartu_kendali_lokasi_kartu_id_foreign');
        });
        Schema::table('kartu_kendali', function (Blueprint $table) {
            $table->integer('lokasi_kartu_id')->change();
        });
        Schema::table('kartu_kendali', function (Blueprint $table) {
            $table->dropForeign('kartu_kendali_unit_id_foreign');
        });
        Schema::table('kartu_kendali', function (Blueprint $table) {
            $table->dropIndex('kartu_kendali_unit_id_foreign');
        });
        Schema::table('kartu_kendali', function (Blueprint $table) {
            $table->integer('unit_id')->change();
        });
    }
}

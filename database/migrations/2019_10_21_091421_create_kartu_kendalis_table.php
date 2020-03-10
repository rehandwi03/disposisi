<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKartuKendalisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kartu_kendali', function (Blueprint $table) {
            $table->increments('kartu_kendali_id');
            $table->integer('jenis_surat_id');
            $table->string('perihal', 100);
            $table->date('tanggal_pembuatan');
            $table->integer('status_kartu_kendali')->length(1);
            $table->integer('klasifikasi_dokumen_id');
            $table->integer('lokasi_kartu_id');
            $table->integer('unit_id');
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
        Schema::dropIfExists('kartu_kendali');
    }
}

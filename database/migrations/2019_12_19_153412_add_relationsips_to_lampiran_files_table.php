<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationsipsToLampiranFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('lampiran_file', function (Blueprint $table) {
            $table->integer('isi_kartu_id')->unsigned()->change();
            $table->foreign('isi_kartu_id')->references('isi_kartu_id')->on('isi_kartu')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('lampiran_files', function (Blueprint $table) {
            //
        });
    }
}

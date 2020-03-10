<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIsiKartusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('isi_kartu', function (Blueprint $table) {
            $table->increments('isi_kartu_id', true);
            $table->integer('kartu_kendali_id')->length(11);
            $table->string('from', 30);
            $table->string('to', 30);
            $table->date('tanggal_membalas');
            $table->text('disposisi');
            $table->integer('status_isi_kartu')->length(1);
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
        Schema::dropIfExists('isi_kartu');
    }
}

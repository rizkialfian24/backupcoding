<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subjuduls', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_deskripsi');
            $table->string('sub');
            $table->string('sub_judul');
            $table->enum('jenis',['1','2','3','4']);
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
        Schema::dropIfExists('subjuduls');
    }
};

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
        Schema::create('resep_dokter', function (Blueprint $table) {
            $table->id("re_id");
            $table->unsignedBigInteger("ks_id");
            $table->unsignedBigInteger("ob_id");
            $table->integer("re_hari");
            $table->string("re_keterangan", 255);
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
        Schema::dropIfExists('resep_dokter');
    }
};

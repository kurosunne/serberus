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
        Schema::create('djual_obat', function (Blueprint $table) {
            $table->id("do_id");
            $table->unsignedBigInteger("ps_id");
            $table->date("do_tanggal");
            $table->double("do_total");
            $table->timestamps();
            $table->softDeletes();

            $table->foreign("ps_id")->references("ps_id")->on("pasien")->onUpdate("cascade")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('djual_obat');
    }
};

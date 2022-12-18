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
        Schema::create('chat', function (Blueprint $table) {
            $table->id("ch_id");
            $table->integer("ch_sender_is_dokter");
            $table->unsignedBigInteger("ks_id");
            $table->text("ch_teks");
            $table->timestamps();

            $table->foreign("ks_id")->references("ks_id")->on("konsultasi")->onUpdate("cascade")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chat');
    }
};

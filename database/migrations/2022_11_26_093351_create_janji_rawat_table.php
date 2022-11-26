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
        Schema::create('janji_rawat', function (Blueprint $table) {
            $table->id("jr_id");
            $table->unsignedBigInteger("ps_id");
            $table->unsignedBigInteger("pr_id");
            $table->date("jr_tanggal");
            $table->timestamps();
            $table->softDeletes();

            $table->foreign("ps_id")->references("ps_id")->on("pasien")->onUpdate("cascade")->onDelete("cascade");
            $table->foreign("pr_id")->references("pr_id")->on("perawat")->onUpdate("cascade")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('janji_rawat');
    }
};

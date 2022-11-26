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
        Schema::create('dokter', function (Blueprint $table) {
            $table->id("dk_id");
            $table->unsignedBigInteger("rs_id");
            $table->unsignedBigInteger("sp_id");
            $table->string("dk_nama", 100);
            $table->string("dk_email", 40);
            $table->string("dk_telp", 15);
            $table->string("dk_password", 255);
            $table->timestamps();

            $table->foreign("rs_id")->references("rs_id")->on("rumah_sakit")->onUpdate("cascade")->onDelete("cascade");
            $table->foreign("sp_id")->references("sp_id")->on("spesialis")->onUpdate("cascade")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dokter');
    }
};

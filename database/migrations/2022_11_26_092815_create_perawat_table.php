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
        Schema::create('perawat', function (Blueprint $table) {
            $table->id("pr_id");
            $table->unsignedBigInteger("rs_id");
            $table->string("pr_nama",100);
            $table->string("pr_email",40);
            $table->string("pr_telp",15);
            $table->string("pr_password",255);
            $table->timestamps();

            $table->foreign("rs_id")->references("rs_id")->on("rumah_sakit")->onUpdate("cascade")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('perawat');
    }
};

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
            $table->integer("do_stok");
            $table->double("do_total");
            $table->unsignedBigInteger("ob_id");
            $table->unsignedBigInteger("ho_id");

            $table->foreign("ob_id")->references("ob_id")->on("obat")->onUpdate("cascade")->onDelete("cascade");
            $table->foreign("ho_id")->references("ho_id")->on("hjual_obat")->onUpdate("cascade")->onDelete("cascade");
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

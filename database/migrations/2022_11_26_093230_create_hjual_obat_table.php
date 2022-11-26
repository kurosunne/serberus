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
        Schema::create('hjual_obat', function (Blueprint $table) {
            $table->id("ho_id");
            $table->unsignedBigInteger("ob_id");
            $table->unsignedBigInteger("do_id");

            $table->foreign("ob_id")->references("ob_id")->on("obat")->onUpdate("cascade")->onDelete("cascade");
            $table->foreign("do_id")->references("do_id")->on("djual_obat")->onUpdate("cascade")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hjual_obat');
    }
};

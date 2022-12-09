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
        if(!Schema::hasTable("obat")){
            Schema::create('obat', function (Blueprint $table) {
                $table->id("ob_id");
                $table->string("ob_nama",100);
                $table->double("ob_kandunganVal")->nullable();
                $table->string("ob_kandunganSatuan",20)->nullable();
                $table->double("ob_harga")->default(0);
                $table->integer("ob_stok");
                $table->text("ob_deskripsi");
                $table->unsignedBigInteger("to_id");
                $table->timestamps();
                $table->softDeletes();

                $table->foreign("to_id")->references("to_id")->on("tipe_obat")->onUpdate("cascade")->onDelete("cascade");
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('obat');
    }
};

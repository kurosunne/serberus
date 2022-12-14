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
            $table->unsignedBigInteger("ps_id");
            $table->string('ho_status');
            $table->string('ho_orderId');
            $table->string('ho_grossAmount');
            $table->string('ho_paymentType');
            $table->string('ho_paymentCode')->nullable();
            $table->string('ho_pdfUrl')->nullable();
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
        Schema::dropIfExists('hjual_obat');
    }
};

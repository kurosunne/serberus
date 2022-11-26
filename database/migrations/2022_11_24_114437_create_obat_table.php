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
                $table->string("ob_na",100);
                $table->integer("ob_beratVal");
                $table->integer("ob_beratSatuan");
                $table->smallInteger("ob_status");
                $table->timestamps();
                $table->softDeletes();
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

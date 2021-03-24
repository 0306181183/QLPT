<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHopdong extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('HopDong', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->date('ngaylap');
            $table->integer('thoihan');
            $table->integer('tiencoc');
            $table->boolean('trangthai')->default(true);
            $table->uuid('idphong');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hopdong');
    }
}

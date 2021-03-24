<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGiadichvu extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('GiaDichVu', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->integer('idloai');
            $table->integer('giathaydoi');
            $table->dateTime('ngaythaydoi');
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
        Schema::dropIfExists('giadichvu');
    }
}

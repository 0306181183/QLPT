<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrangthaithue extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('TrangThaiThue', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->integer('chisodien');
            $table->uuid('idhopdong');
            $table->integer('soxe');
            $table->integer('songuoi');
            $table->integer('giaphong');
            $table->boolean('wifi');
            $table->date('ngaylap');
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
        Schema::dropIfExists('trangthaithue');
    }
}

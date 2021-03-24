<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Khoangoai extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('HopDong', function (Blueprint $table) {
            $table->foreign('idphong')->references('id')->on('Phong');
        });

        Schema::table('KhachTro', function (Blueprint $table) {
            $table->foreign('idhopdong')->references('id')->on('HopDong');
        });

        Schema::table('Xe', function (Blueprint $table) {
            $table->foreign('idkhach')->references('id')->on('KhachTro');
        });

        Schema::table('Log', function (Blueprint $table) {
            $table->foreign('idhopdong')->references('id')->on('HopDong');
        });

        Schema::table('TrangThaiThue', function (Blueprint $table) {
            $table->foreign('idhopdong')->references('id')->on('HopDong');
        });

        Schema::table('PhieuThu', function (Blueprint $table) {
            $table->foreign('idtrangthaithue')->references('id')->on('TrangThaiThue');
        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}

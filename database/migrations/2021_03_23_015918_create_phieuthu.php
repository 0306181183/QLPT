<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhieuthu extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('PhieuThu', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->integer('giaphong');
            $table->integer('tiendien');
            $table->integer('tiennuoc');
            $table->integer('tienwifi');
            $table->integer('tienxe');
            $table->integer('tienrac');
            $table->integer('tienquanly');
            $table->boolean('trangthai')->default(true);
            $table->uuid('idtrangthaithue');

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
        Schema::dropIfExists('phieuthu');
    }
}

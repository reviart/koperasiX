<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePenerimaanDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penerimaandetails', function (Blueprint $table) {
            $table->increments('id');
            $table->decimal('nilai');
            $table->unsignedInteger('admin_id')->nullable();
            $table->unsignedInteger('user_id')->nullable();
            $table->unsignedInteger('penerimaan_id');
            $table->timestamps();//tampilkan

            $table->foreign('admin_id')->references('id')->on('admins');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('penerimaan_id')->references('id')->on('penerimaans');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('penerimaandetails');
    }
}

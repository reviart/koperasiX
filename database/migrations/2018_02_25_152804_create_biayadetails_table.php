<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBiayaDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('biayadetails', function (Blueprint $table) {
            $table->increments('id');
            $table->decimal('biaya');
            $table->unsignedInteger('admin_id')->nullable();
            $table->unsignedInteger('user_id')->nullable();
            $table->unsignedInteger('biaya_id');
            $table->timestamps();//tampilkan

            $table->foreign('admin_id')->references('id')->on('admins');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('biaya_id')->references('id')->on('biayas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('biayadetails');
    }
}

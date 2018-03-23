<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePenerimaansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penerimaans', function (Blueprint $table) {
            $table->increments('id');
            $table->decimal('total_nilai');
            $table->string('tipe'); //pilihan rutin/non
            $table->string('status'); //pilihan lunas/belum
            $table->unsignedInteger('admin_id')->nullable();
            $table->unsignedInteger('user_id')->nullable();
            $table->unsignedInteger('kontrak_id');
            $table->timestamps();

            $table->foreign('admin_id')->references('id')->on('admins');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('kontrak_id')->references('id')->on('kontraks');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('penerimaans');
    }
}

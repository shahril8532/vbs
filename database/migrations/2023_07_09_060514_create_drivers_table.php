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
        Schema::create('drivers', function (Blueprint $table) {
            $table->id();
            $table->string('nokadpengenalan')->nullable();
            $table->string('nama_pemandu')->nullable();
            $table->string('notelefon')->nullable();
            $table->string('status')->nullable();
            $table->timestamps();
        });
        //Schema::table('bookings', function (Blueprint $table) {
		//	$table->dropColumn('namapemandu1');
		//	$table->foreignId('driver_id')->references('id')->on('drivers');
		//});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('drivers');
    }
};

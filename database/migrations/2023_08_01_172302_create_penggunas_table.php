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

        Schema::create('penggunas', function (Blueprint $table) {
            $table->id();
            $table->string('nokadpengenalan')->nullable();
            $table->string('nama')->nullable();
            $table->string('notelefon')->nullable();
            $table->string('jawatan')->nullable();
            $table->string('sektor')->nullable();
            $table->string('status')->nullable();
            $table->timestamps();
        });
        //Schema::table('bookings', function (Blueprint $table) {
		//	$table->dropColumn('namapemohon');
		//	$table->foreignId('pengguna_id')->references('id')->on('penggunas');
		//});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('penggunas');
    }
};

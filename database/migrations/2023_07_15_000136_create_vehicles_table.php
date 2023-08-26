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
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('driver_id')->constrained('drivers')->onDelete('cascade')->onUpdate('cascade');
            $table->string('vehicle')->nullable();
            $table->string('model')->nullable();
            $table->string('nodaftar')->nullable();
            $table->string('status')->nullable();
            $table->timestamps();
        });
        //Schema::table('bookings', function (Blueprint $table) {
		//	$table->dropColumn('jeniskenderaan');
		//	$table->foreignId('vehicle_id')->references('id')->on('vehicles');
		//});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vehicles');
    }
};

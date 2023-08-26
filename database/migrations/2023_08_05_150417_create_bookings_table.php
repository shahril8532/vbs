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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('driver_id')->constrained('drivers')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('vehicle_id')->constrained('vehicles')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('pengguna_id')->constrained('penggunas')->onDelete('cascade')->onUpdate('cascade');
            $table->string('image')->nullable();
            $table->string('namapemohon')->nullable();
            $table->string('emel')->unique();
            $table->string('tempahan_id')->nullable();
            $table->string('jawatan')->nullable();
            $table->string('namapengguna')->nullable();
            $table->text('jenis')->nullable();
            $table->string('bilangan')->nullable();
            $table->string('notel')->nullable();
            $table->string('sektor')->nullable();
            $table->string('tujuan')->nullable();
            $table->string('jarak')->nullable();
            $table->text('namapenumpang')->nullable();
            $table->string('start_date')->nullable();
            $table->string('keperluan')->nullable();
            $table->string('destinasi')->nullable();
            $table->string('end_date')->nullable();
            $table->string('penginapan')->nullable();
            $table->string('negeri')->nullable();
            $table->string('namapemandu1')->nullable();
            $table->string('namapemandu2')->nullable();
            $table->string('notelpemandu1')->nullable();
            $table->string('notelpemandu2')->nullable();
            $table->string('catatan')->nullable();
            $table->string('jeniskenderaan')->nullable();
            $table->string('nopendaftaran')->nullable();
            $table->string('jeniskenderaan2')->nullable();
            $table->string('nopendaftaran2')->nullable();
            $table->string('status')->nullable()->default('DALAM PROSES');
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
        Schema::dropIfExists('bookings');
    }
};

<?php

namespace App\Models;
//use App\Models\pengguna;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Pengguna extends Model
{
    use HasFactory;
    protected $table = 'penggunas';
    protected $fillable = [
    'nokadpengenalan',
    'nama',
    'jawatan',
    'sektor',
    'notelefon',
    'status',
    ];

    public function booking()
	{
		return $this->hasMany(Booking::class, 'pengguna_id');
	}
}

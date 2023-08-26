<?php

namespace App\Models;
use App\Models\vehicle;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Driver extends Model
{
    use HasFactory;
    protected $table = 'drivers';
    protected $fillable = [
    'nokadpengenalan',
    'nama_pemandu',
    'notelefon',
    'status',
    ];

    public function booking()
	{
		return $this->hasMany(Booking::class, 'driver_id');
	}
    
}

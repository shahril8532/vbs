<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
//use Illuminate\Database\Eloquent\SoftDeletes;

class Vehicle extends Model
{
    use HasFactory;
    //use SoftDeletes;
    protected $table = 'vehicles';
    protected $fillable = [
    'driver_id',
    'vehicle',
    'model',
    'nodaftar',
    'status',
    ];
    //protected $guarded = [];

    //protected $hidden = ['created_at', 'updated_at'];
    
    public function driver()
    {
        return $this->belongsTo('App\Models\Driver');
    }

    public function booking()
	{
		return $this->hasMany(Booking::class, 'vehicle_id');
        //return $this->belongsTo('Vehicle')->select(['id', 'nama_pemandu']);
	}

}

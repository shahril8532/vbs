<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;
    //use SoftDeletes;
    protected $table = 'bookings';
    protected $fillable = [
    //'id',
    'driver_id',
    'vehicle_id',
    'pengguna_id',
    'image',
    'jawatan',
    'namapengguna',
    'jenis',
    'bilangan',
    'notel',
    'sektor',
    'tujuan',
    'jarak',
    'namapenumpang',
    'start_date',
    'keperluan',
    'destinasi',
    'end_date',
    'penginapan',
    'catatan',
    'negeri',
    'status',
    'namapemandu1',
    'namapemandu2',
    'notelpemandu1',
    'notelpemandu2',
    'jeniskenderaan',
    'nopendaftaran',
    ];
    
    public function driver()
    {
        return $this->belongsTo('App\Models\Driver');
        //return $this->belongsTo(Driver::class,'driver_id');
    }
    public function vehicle()
    {
        return $this->belongsTo('App\Models\Vehicle');
        //return $this->belongsTo('App\Models\Vehicle')->select(['id', 'nama_pemandu']);
        //return $this->belongsTo(Vehicle::class,'vehicle_id');
    }

    public function pengguna()
    {
        return $this->belongsTo('App\Models\Pengguna');
        //return $this->belongsTo(Pengguna::class,'pengguna_id');
    }
    
    //protected ＄guarded = [];
    //protected $fillable = [
    //    'name', 
    //    'detail', 
    //    'image',
    //    'date',// => 'datetime:d/m/Y', // Change your format,
    //];
}

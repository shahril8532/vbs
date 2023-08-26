<?php

namespace App\Http\Controllers;
//use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Driver;
use App\Models\Vehicle;
use App\Models\Pengguna;
//use Illuminate\Http\Response;
//use Illuminate\Support\Carbon;
use Carbon\Carbon;

class ReportsController extends Controller
{
    public function index()
    {
        $bookings = Booking::get();
        return view('users.reports.index',compact('bookings'))
        ->with('i', (request()->input('page', 1) - 1) * 4);
    }    
    

    public function filter(Request $request)
    {
       $validatedData = $request->validate([
           'start_date' => 'required',
           'end_date' => 'required',
        ],[
           'start_date.required' => 'Tarikh Bermula Wajib Diisi.',
           'end_date.required' => 'Tarikh Akhir Wajib Diisi.',
        ]);
        $start_date = $request->get('start_date');
        $end_date = $request->get('end_date');
        //$bookings = $bookings->newQuery();

        $bookings = Booking::whereDate('created_at','>=', $start_date)
                            ->whereDate('created_at','<=', $end_date)
                            ->get();

        return view('users.reports.index',compact('bookings'))
        ->with('i', (request()->input('page', 1) - 1) * 4);
    }
    
}

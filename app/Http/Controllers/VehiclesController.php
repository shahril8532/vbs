<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
Use Alert;
use App\Models\Driver;
use App\Models\Vehicle;
use DB;

class VehiclesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //public function index(Request $request)
    public function index(Request $request)
    {
      
        $keyword = $request->keyword;
        //$vehicles = Vehicle::with('driver');
        $vehicles = Vehicle::get();
                    //->where('vehicle', 'LIKE', '%'.$keyword.'%')
                    //->orWhereHas('driver', function($query) use($keyword){
                    //    $query->where('nama_pemandu', 'LIKE', '%'.$keyword.'%');
                   // })
                   // ->orwhere('model', 'LIKE', '%'.$keyword.'%')
                // ->orwhere('nodaftar', 'LIKE', '%'.$keyword.'%')
                  // ->orwhere('status', 'LIKE', '%'.$keyword.'%')
                  // ->paginate(5);
            //$drivers    = DB::table('drivers')->get();
            //$vehicles   = DB::table('vehicles')->get();
            return view('users.vehicles.index', compact('vehicles'))
            ->with('i', (request()->input('page', 1) - 1) * 4);

    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $drivers = Driver::all();
        return view('users.vehicles.create', compact('drivers'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $validatedData = $request->validate([
        'driver_id' => 'required',
        'vehicle' => 'required|string|max:255',
        'model' =>  'required|string|max:255',
        'nodaftar' => 'required|string|max:255',
        'status' => 'required'
        ], [
        'driver_id.required' => 'Nama Pemandu Wajib Diisi.',
        'vehicle.required' => 'Jenis Kenderaan Wajib Diisi.',
        'model.required' => 'Model Kenderaan Wajib Diisi.',
        'nodaftar.required' => 'Nombor Pendaftaran Kenderaan Wajib Diisi.',
        'status.required' => 'Status Kenderaan Wajib Diisi.',
        ]);
    
        $vehicles = Vehicle::create($request->all());
            toast('Kenderaan Berjaya Ditambah!','success');
            return redirect('users/vehicles');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Vehicle $vehicle)
    {
        $vehicle->makeHidden(['driver_id']);
        return view('users.vehicles.show', compact('vehicle'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Vehicle $vehicle)
    {
        $drivers = Driver::all();
        return view('users.vehicles.edit', compact('vehicle', 'drivers'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vehicle $vehicle)
    {
        $validatedData = $request->validate([
            'driver_id' => 'required',
            'vehicle' => 'required|string|max:255',
            'model' =>  'required|string|max:255',
            'nodaftar' => 'required|string|max:255',
            'status' => 'required'
            ], [
            'driver_id.required' => 'Nama Pemandu Wajib Diisi.',
            'vehicle.required' => 'Jenis Kenderaan Wajib Diisi.',
            'model.required' => 'Model Kenderaan Wajib Diisi.',
            'nodaftar.required' => 'Nombor Pendaftaran Kenderaan Wajib Diisi.',
            'status.required' => 'Status Kenderaan Wajib Diisi.',
            ]);
        Vehicle::where('id', $vehicle->id)
        ->update([
            'driver_id' => $request->driver_id,
            'vehicle' => $request->vehicle,
            'model' => $request->model,
            'nodaftar' => $request->nodaftar,
            'status' => $request->status,
          ]);
          toast('Kenderaan Berjaya Dikemaskini!','success');
          //Alert::success('Berjaya!!', 'Kenderaan Berjaya Dikemaskini.');
        return redirect('users/vehicles');

    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vehicle $vehicle)
    {
        // cara 1
        $vehicle->delete();

        // cara 2
        // Program::destroy($program->id);

        // cara 3
        // Program::where('id', $program->id)->delete();
        //return view('users.vehicles.index')->with('status', 'Kenderaan Berjaya Dihapus!');
        //Alert::success('Berjaya!!', 'Kenderaan Berjaya Dihapus.');
        toast('Kenderaan Berjaya Dihapus!','success');
        return redirect('users/vehicles');
    }    
}

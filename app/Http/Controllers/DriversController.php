<?php

namespace App\Http\Controllers;
//use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;
use App\Models\Driver;
use DataTables;

class DriversController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Driver::latest()->get();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                        $action = ""; 
                        $action.="<a class='btn btn-xs btn-success' id='btnShow' title='Info' href='".route('users.drivers.show', $row->id)."'><i class='fas fa-eye'></i></a> "; 
                        $action.="<a class='btn btn-xs btn-warning' id='btnEdit' title='Kemaskini' href='".route('users.drivers.edit', $row->id)."'><i class='fas fa-edit'></i></a>"; 
                        $action.=" <button class='btn btn-xs btn-outline-danger' title='Hapus' id='btnDel' data-id='".$row->id."'><i class='fas fa-trash'></i></button>"; 
                        return $action;
                    })
                    ->make(true);
        }
      
        return view('users.drivers.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Driver $driver)
    {
        //Validate name
        $this->validate($request, [
            'nokadpengenalan' => 'required',
            'nama_pemandu' => 'required',
            'notelefon' => 'required',
            'status' => 'required'],
            [
            'nokadpengenalan.required' => 'No Kad Pengenalan Pemandu Wajib Diisi.',
            'nama_pemandu.required' => 'Nama Pemandu Wajib Diisi.',
            'notelefon.required' => 'No Telefon Pemandu Wajib Diisi.',
            'status.required' => 'Status Pemandu Wajib Diisi.',    
        ]);
        $driver = Driver::create([
            'nokadpengenalan' => $request->nokadpengenalan,
            'nama_pemandu' => strtoupper(trim($request->nama_pemandu)),
            'notelefon' => $request->notelefon,
            'status'=>$request->status,
        ]);     
        if($driver)
        {
            toast('Pemandu Berjaya Ditambah!.','success');
            return view('users.drivers.index');
        }
        toast('Gagal Pemandu Ditambah!!','error');
        return back()->withInput();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Driver $driver)
    {
        return view('users.drivers.show')->with(['driver' => $driver]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Driver $driver)
    {
        return view('users.drivers.edit')->with(['driver' => $driver]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nokadpengenalan' => 'required',
            'nama_pemandu' => 'required',
            'notelefon' => 'required',
            'status' => 'required',
        ]);
        $driver = Driver::find($id);
        $driver->update($request->only('nokadpengenalan'));
        $driver->update($request->only('nama_pemandu'));
        $driver->update($request->only('notelefon'));
        $driver->update($request->only('status'));
        
        if($driver)
        {
            toast('Pemandu Berjaya Dikemaskini!.','success');
            return view('users.drivers.index');
        }
        toast('Error on Updating Driver','error');
        return back()->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Driver $driver)
    {

        if($request->ajax() && $driver->delete())
        {
            toast('Pemandu Berjaya Dihapus!.','success');
            return response(["message" => "Driver Deleted Successfully"], 200);
        }
        return response(["message" => "Data Delete Error! Please Try again"], 201);
    }
}

<?php

namespace App\Http\Controllers;
//use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;
use App\Models\Pengguna;
use DataTables;

class PenggunasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Pengguna::latest()->get();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                        $action = ""; 
                        $action.="<a class='btn btn-xs btn-success' id='btnShow' title='Info' href='".route('users.penggunas.show', $row->id)."'><i class='fas fa-eye'></i></a> "; 
                        $action.="<a class='btn btn-xs btn-warning' id='btnEdit' title='Kemaskini' href='".route('users.penggunas.edit', $row->id)."'><i class='fas fa-edit'></i></a>"; 
                        $action.=" <button class='btn btn-xs btn-outline-danger' title='Hapus' id='btnDel' data-id='".$row->id."'><i class='fas fa-trash'></i></button>"; 
                        return $action;
                    })
                    ->make(true);
        }
      
        return view('users.penggunas.index');
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
    public function store(Request $request, Pengguna $pengguna)
    {
        //Validate name
        $this->validate($request, [
            'nokadpengenalan' => 'required',
            'nama' => 'required',
            'jawatan' => 'required',
            'sektor' => 'required',
            'notelefon' => 'required',
            'status' => 'required'],
            [
            'nokadpengenalan.required' => 'No Kad Pengenalan Pengguna Wajib Diisi.',
            'nama.required' => 'Nama Pengguna Wajib Diisi.',
            'jawatan.required' => 'Jawatan Pengguna Wajib Diisi.',
            'sektor.required' => 'Sektor / Unit Pengguna Wajib Diisi.',
            'notelefon.required' => 'No Telefon Pengguna Wajib Diisi.',
            'status.required' => 'Status Pengguna Wajib Diisi.',
        ]);
        $pengguna = Pengguna::create([
            'nokadpengenalan' => $request->nokadpengenalan,
            'nama' => strtoupper(trim($request->nama)),
            'notelefon' => $request->notelefon,
            'jawatan' => $request->jawatan,
            'sektor'=>$request->sektor,
            'status'=>$request->status,
        ]);     
        if($pengguna)
        {
            toast('Pengguna Berjaya Ditambah!.','success');
            return view('users.penggunas.index');
        }
        toast('Pengguna Gagal Ditambah!!','error');
        return back()->withInput();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Pengguna $pengguna)
    {
        return view('users.penggunas.show')->with(['pengguna' => $pengguna]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Pengguna $pengguna)
    {
        return view('users.penggunas.edit')->with(['pengguna' => $pengguna]);
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
            'nama' => 'required',
            'jawatan' => 'required',
            'sektor' => 'required',
            'notelefon' => 'required',
            'status' => 'required',
        ]);
        $pengguna = Pengguna::find($id);
        $pengguna->update($request->only('nokadpengenalan'));
        $pengguna->update($request->only('nama'));
        $pengguna->update($request->only('jawatan'));
        $pengguna->update($request->only('sektor'));
        $pengguna->update($request->only('notelefon'));
        $pengguna->update($request->only('status'));
        
        if($pengguna)
        {
            toast('Pengguna Berjaya Dikemaskini!.','success');
            return view('users.penggunas.index');
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
    public function destroy(Request $request, Pengguna $pengguna)
    {

        if($request->ajax() && $pengguna->delete())
        {
            toast('Pengguna Berjaya Dihapus!.','success');
            return response(["message" => "Driver Deleted Successfully"], 200);
        }
        return response(["message" => "Data Delete Error! Please Try again"], 201);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Snowfire\Beautymail\Beautymail;
use Mail;
use App\Mail\BookingMail;
Use Alert;
use App\Models\Booking;
use App\Models\Driver;
use App\Models\Vehicle;
use App\Models\Pengguna;
use Barryvdh\DomPDF\Facade\Pdf;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Carbon\Carbon;
use DB;
use JeroenNoten\LaravelAdminLte\View\Components\Form\Select;

class BookingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //$keyword = $request->keyword;
        $bookings = Booking::get();
        //$bookings = Booking::with('pengguna','vehicle','driver')
                    //->where('start_date', 'LIKE', '%'.$keyword.'%')
                    //->orWhereHas('pengguna', function($query) use($keyword){
                    //$query->where('nama', 'LIKE', '%'.$keyword.'%');
                    //})
                    //->orwhere('end_date', 'LIKE', '%'.$keyword.'%')
                    //->orwhere('sektor', 'LIKE', '%'.$keyword.'%')
                    //->orwhere('destinasi', 'LIKE', '%'.$keyword.'%')
                    //->orwhere('status', 'LIKE', '%'.$keyword.'%')
                    //->paginate(3);
        return view('users.bookings.index',compact('bookings'))
        ->with('i', (request()->input('page', 1) - 1) * 4);

        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Booking $booking)
    {
        $penggunas = Pengguna::get();
        $drivers = Driver::get();
        $vehicles = Vehicle::get();
		return view('users.bookings.create',compact('penggunas','drivers','vehicles'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Booking $booking)
    {	
        $validatedData = $request->validate([
            'pengguna_id' => 'required',
            'jawatan' => 'required',
            'namapengguna' => 'required',
            'jenis' => 'required',
            'bilangan' => 'required',
            'notel' => 'required',
            'sektor' => 'required',
            'tujuan' => 'required',
            'jarak' => 'required',
            'namapenumpang' => 'required',
            'start_date' => 'required',
            'destinasi' => 'required',
            'end_date' => 'required',
            'negeri' => 'required',
            'emel' => 'required|email',
            'image' => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ],[
            'pengguna_id.required' => 'Nama Pemohon Wajib Diisi.',
            'jawatan.required' => 'Jawatan Pemohon Wajib Diisi.',
            'namapengguna.required' => 'Nama Pengguna Wajib Diisi.',
            'emel.required' => 'Emel Yang Aktif Wajib Diisi.',
            'emel.email' => 'Jenis Format Emel @xyz.',
            'jenis.required' => 'Jenis Tugas Rasmi Wajib Diisi.',
            'bilangan.required' => 'Bilangan Penumpang Wajib Diisi.',
            'notel.required' => 'Nombor Telefon Pemohon Wajib Diisi.',
            'sektor.required' => 'Sektor / Unit Organisasi Pemohon Wajib Diisi.',
            'tujuan.required' => 'Tujuan Pemohon Wajib Diisi.',
            'jarak.required' => 'Jarak Perjalanan Pemohon Wajib Diisi.',
            'namapenumpang.required' => 'Nama Penumpang Wajib Diisi.',
            'start_date.required' => 'Tarikh Guna dan Masa Bertolak Wajib Diisi.',
            'destinasi.required' => 'Destinasi Pemohon Wajib Diisi.',
            'end_date.required' => 'Tarikh dan Masa Pulang Wajib Diisi.',
            'negeri.required' => 'Negeri Wajib Diisi.',
            'image.required' => 'Sila Muat Naik Surat / Dokumen!',
            'image.mimes' => 'Hanya Format jpeg,png,jpg,gif,svg dibenarkan ',
            'image.max' => 'Saiz Fail Hanya 2MB ',
        ]);
            $imgname = "";
            if($request->hasFile('image')){
                $file = $request->file('image');
                $filename = 'vbs-' . time() . rand() . '.' . $file->getClientOriginalExtension();
                $path = $file->storeAs('public/doc_img', $filename);
                $imgname = $filename;
            }

            $id = IdGenerator::generate(['table' => 'bookings','field' => 'tempahan_id', 'length' => 6, 'prefix' => 'VBS']);

                $pengguna_id = $request->pengguna_id;
                $image = $imgname;          
                $namapemohon = $request->pengguna_id;
                $emel = $request->emel;
                $jawatan = $request->jawatan;
                $namapengguna = strtoupper(trim($request->namapengguna));
                $jenis = $request->jenis;
                $bilangan = $request->bilangan;
                $notel = $request->pengguna_id;
                $sektor = $request->pengguna_id;
                $tujuan = $request->tujuan;
                $jarak = $request->jarak;
                $namapenumpang = $request->namapenumpang;
                $start_date = $request->start_date;
                $end_date = $request->end_date;
                $destinasi = $request->destinasi;
                $negeri = $request->negeri;

        $booking = new Booking();
        $booking->tempahan_id = $id;
        $booking->pengguna_id = $pengguna_id;
        $booking->image = $image;
        $booking->emel = $emel;
        $booking->namapemohon = $namapemohon;
        $booking->jawatan = $jawatan;
        $booking->namapengguna = $namapengguna;
        $booking->jenis = $jenis;
        $booking->bilangan = $bilangan;
        $booking->notel = $notel;
        $booking->sektor = $sektor;
        $booking->tujuan = $tujuan;
        $booking->jarak = $jarak;
        $booking->namapenumpang = $namapenumpang;
        $booking->start_date = $start_date;
        $booking->end_date = $end_date;
        $booking->destinasi = $destinasi;
        $booking->negeri = $negeri;
        $booking->save();
        
        //$booking = Booking::create($data);
        //if($booking)
        //{
            toast('Tempahan Berjaya Ditambah!.','success');
            return redirect('users/bookings');
        //}
        //    toast('Tempahan Gagal Ditambah!!','error');
        //    return back()->withInput();
    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Booking $booking)
    {
        //$booking = Booking::with('pengguna','vehicle','driver');
        $booking->makeHidden(['pengguna_id','driver_id','vehicle_id']);
        return view('users.bookings.show', compact('booking'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Booking $booking)
    {
        $penggunas = Pengguna::get();
        $drivers = Driver::get();
        $vehicles = Vehicle::get();
        return view('users.bookings.edit',compact('booking','penggunas','drivers','vehicles'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Booking $booking)
    {
        $validatedData = $request->validate([
            'vehicle_id' => 'required',
            'driver_id' => 'required',
            'status' => 'required',
            'keperluan' => 'required',
            'penginapan' => 'required',
            //'emel' => 'required|email',
            'catatan' => 'required',
            'namapemandu2' => 'required',
            //'notelpemandu1' => 'required',
            'notelpemandu2' => 'required',
            //'nopendaftaran' => 'required',
            'jeniskenderaan2' => 'required',
            'nopendaftaran2' => 'required',
        ],[
            'vehicle_id.required' => 'Nombor Pendaftaran Kenderaan Bertolak Wajib Diisi.',
            'driver_id.required' => 'Nama Pemandu 1 Wajib Diisi.',
            'status.required' => 'Status Wajib Diisi.',
            'emel.required' => 'Emel Yang Aktif Wajib Diisi.',
            //'emel.email' => 'Jenis Format Emel @xyz.',
            'keperluan.required' => 'Keperluan Pemandu Bermalam Wajib Diisi.',
            'penginapan.required' => 'Penginapan Pemandu Wajib Diisi.',
            'catatan.required' => 'Catatan Wajib Diisi.',
            'namapemandu2.required' => 'Nama Pemandu 2 Pemohon Wajib Diisi.',
            //'notelpemandu1.required' => 'Nombor Telefon Pemandu 1 Wajib Diisi.',
            'notelpemandu2.required' => 'Nombor Telefon Pemandu 2 Wajib Diisi.',
            //'nopendaftaran.required' => 'Nombor Pendaftaran Kenderaan Bertolak Wajib Diisi.',
            'nopendaftaran2.required' => 'Nombor Pendaftaran Kenderaan Pulang Wajib Diisi.',
            'jeniskenderaan2.required' => 'Jenis Kenderaan Pulang Wajib Diisi.',
        ]);

        $driver_id = $request->driver_id;
        $vehicle_id = $request->vehicle_id;
        $namapemohon = $request->pengguna_id;
        //$emel = $request->emel;
        $jawatan = $request->jawatan;
        $namapengguna = $request->namapengguna;
        $jenis = $request->jenis;
        $bilangan = $request->bilangan;
        $notel = $request->notel;
        $sektor = $request->sektor;
        $tujuan = $request->tujuan;
        $jarak = $request->jarak;
        $namapenumpang = $request->namapenumpang;
        $start_date = $request->start_date;
        $end_date = $request->end_date;
        $keperluan = $request->keperluan;
        $penginapan = $request->penginapan;
        $destinasi = $request->destinasi;
        $negeri = $request->negeri;
        $catatan = $request->catatan;
        $status = $request->status;
        $namapemandu1 = $request->driver_id;
        $namapemandu2 = $request->namapemandu2;
        //$notelpemandu1 = $request->notelpemandu1;
        $notelpemandu2 = $request->notelpemandu2;
        //$jeniskenderaan = $request->vehicle_id;
        $nopendaftaran = $request->vehicle_id;
        $jeniskenderaan2 = $request->jeniskenderaan2;
        $nopendaftaran2 = $request->nopendaftaran2;

        Booking::where('id', $booking->id)->update([
            'driver_id' => $driver_id,
            'vehicle_id' => $vehicle_id,
            'namapemohon' => $namapemohon,
            //'emel' => $emel,
            'jawatan' => $jawatan,
            'namapengguna' => $namapengguna,
            'jenis' => $jenis,
            'bilangan' => $bilangan,
            'notel' => $notel,
            'sektor' => $sektor,
            'tujuan' => $tujuan,
            'jarak' => $jarak,
            'namapenumpang' => $namapenumpang,
            'start_date' => $start_date,
            'end_date' => $end_date,
            'keperluan' => $keperluan,
            'penginapan' => $penginapan,
            'destinasi' => $destinasi,
            'negeri' => $negeri,
            'catatan' => $catatan,
            'status' => $status,
            'namapemandu1'=> $namapemandu1,
            'namapemandu2'=> $namapemandu2,
            //'notelpemandu1'=> $notelpemandu1,
            'notelpemandu2'=> $notelpemandu2,
            //'jeniskenderaan'=> $jeniskenderaan,
            'nopendaftaran'=> $nopendaftaran,
            'jeniskenderaan2'=> $jeniskenderaan2,
            'nopendaftaran2'=> $nopendaftaran2,
        ]);

        toast('Tempahan Berjaya DiKemaskini!','success');
        return redirect('users/bookings');
            //->update([
           // ]);

        //if ($image = $request->file('image')) {
        //    $destinationPath = 'images/';
        //    $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
        //    $image->move($destinationPath, $profileImage);
        //    $input['image'] = "$profileImage";
        //}else{
        //    unset($data['image']);
        //}

        //$imgname = "";
        //if($request->hasFile('image')){
        //    $file = $request->file('image');
        //    $filename = 'vbs-' . time() . rand() . '.' . $file->getClientOriginalExtension();
        //    $path = $file->storeAs('public/doc_img', $filename);
        //    $imgname = $filename;
        //}else{
        //    unset($imgname['image']);
        //}
        
        //$booking->update($data);
        //return redirect()->route('users.bookings.index')
        //                ->with('success','Tempahan Berjaya Dikemaskini!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Booking $booking)
    {
        $booking->delete();
        toast('Tempahan Berjaya Dihapuskan!','success');
        return redirect('users/bookings');
    }


    public function export(Booking $booking)
    {
        $booking = Booking::with('pengguna','vehicle','driver');
        //$booking = Booking::where('$primarykey','$parameter')->first();
        $pdf = Pdf::loadView('users.bookings.show',compact('booking'));
        return $pdf->download('Tempahan.pdf');
    }

    public function contact_mail()
    {
        //$booking = Booking::where('namapemohon','SHAHRIL BIN MOHD ISA')->first();
        //$booking = Booking::where('id', $booking->id)->Select([
        //    'namapemohon'   => $booking->namapemohon,
        //    'emel'          => $booking->emel,
        //    'tempahan_id'   => $booking->tempahan_id,
        //    'status'        => $booking->status,
        //]);
        //$data = [
        //        'namapemohon'   => $booking->namapemohon,
        //        'emel'          => $booking->emel,
        //        'tempahan_id'   => $booking->tempahan_id,
        //        'status'        => $booking->status,
        //];
        //Mail::to($booking->emel)->send(new bookingMail($data));
        $booking = Booking::select('emel')->get();
        $emails = [];
        foreach($booking as $mail){
            $emails[] = $mail['emel'];
        }
        Mail::send('emails.testmail',[], function($message) use ($emails)
        {
            $message->to($emails)
            ->subject('Tempahan Kenderaan');
        });

        toast('Tempahan Berjaya Dihantar Ke Emel!','success');
        return redirect('users/bookings');
    }
}

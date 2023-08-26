@extends('beautymail::templates.widgets')

@section('content')

	@include('beautymail::templates.widgets.articleStart')

		<h4 class="secondary"><strong>Selamat Datang Tuan / Puan!!</strong></h4>
		<p>Terima Kasih menggunakan perkhidmaan sistem tempahan kenderaan.</p>
        <p>Permohonan Tempahan Anda Sedang Diproses..Sila Semak semula Untuk mengetahui status permohonan yang terkini...</p><br>
        <p>Dari,</p>
        <p>Administrator e-Vehicle Booking System,</p>
        <p>Jabatan Pendidikan Negeri Melaka,</p>
	@include('beautymail::templates.widgets.articleEnd')




@stop
@extends('template.base')
@section('content')


<div class="card">
	<div class="card-body">
		<div class="center">
			<h3>Form Data Undangan</h3>
		</div>
	</div>
</div>

<div class="card mt-3">
	<div class="card-body">
		<form action="{{url('x/jadwal-rapat/create')}}" method="post" enctype="multipart/form-data">
		@csrf

		<div class="row">
			<div class="col-md-6 mt-3">
				<span>Judul Rapat</span>
				<input type="text" class="form-control" name="rapat_judul" required>
			</div>

			<div class="col-md-6 mt-3">
				<span>Lokasi Ruangan</span>
				<input type="text" class="form-control" name="rapat_ruangan" required>
			</div>

			<div class="col-md-6 mt-3">
				<span>Pemimpin Rapat</span>
				<select name="rapat_pimpinan_id" id="" class="form-control" required>
					<option value="" hidden="">-- Pilih Pimpinan Rapat --</option>
					@foreach ($list_pegawai as $item)
						<option value="{{$item->pegawai_id}}">{{ucwords($item->pegawai_nama)}} NIP.{{$item->pegawai_nip}}</option>
					@endforeach
				</select>
			</div>

			<div class="col-md-6 mt-3">
				<span>Tanggal Rapat</span>
				<input type="date" class="form-control" name="rapat_tanggal" required>
			</div>
			
		
			<div class="col-md-6 mt-3">
				<span>Waktu Mulai Rapat</span>
				<input type="time" class="form-control" name="rapat_waktu_mulai" required>
			</div>
			
			<div class="col-md-6 mt-3">
				<span>Waktu Selasai Rapat</span>
				<input type="time" class="form-control" name="rapat_waktu_selesai" required>
			</div>

			
			<div class="col-md-6 mt-3">
				<span>Notulen Rapat</span>
				<select name="rapat_notulen_id" id="" class="form-control" required>
					<option value="" hidden="">-- Pilih Notulen --</option>
					@foreach ($list_pegawai as $item)
						<option value="{{$item->pegawai_id}}">{{ucwords($item->pegawai_nama)}} NIP.{{$item->pegawai_nip}}</option>
					@endforeach
				</select>
			</div>


		
			
			<div class="col-md-6 mt-3">
				<span>Deskripsi Rapat (Pembahasan)</span>
				<textarea name="rapat_deskripsi" id="" cols="30" rows="5" class="form-control"></textarea>
			</div>

			<div class="col-md-6 mt-3">
				<span>File Materi/Paparan</span>
				<input type="file" class="form-control" name="file">
			</div>

			<div class="col-md-12 mt-3">
				<button class="btn btn-primary float-right"><i class="mdi mdi-forum"></i> Buat Rapat Baru</button>
			</div>

		</div>
		</form>
	</div>
</div>

@endsection
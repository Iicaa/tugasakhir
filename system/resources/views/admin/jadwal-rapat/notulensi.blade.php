@extends('template.base')
@section('content')


<div class="card">
	<div class="card-body bg-primary text-white">
		<center>
			<h3>CATATAN NOTULENSI</h3>
		</center>
	</div>
</div>

<div class="card mt-3">
	<div class="card-body">
		<h3>
			{{ucwords($detail->rapat_judul)}} <br>
			#{{$detail->rapat_kode}}
		</h3>
	</div>
</div>
@if($count > 0)
<div class="card mt-3">
	<div class="card-body">
		<form action="{{url('x/jadwal-rapat',$detail->jadwal_id)}}/notulensi-update" method="post" enctype="multipart/form-data">
			@csrf
			<textarea name="notulensi_isi" id="summernote" placeholder="Catatan hasil rapat" class="form-control">{!!nl2br($notulensi->notulensi_isi)!!}</textarea>

			<div class="form-group">
				<div id="dynamicTableUntuk"></div>
				<button type="button" name="add" id="add_untuk"
				class="btn btn-sm btn-dark mb-3 mt-3"><i class="mdi mdi-file"></i> Tambah File</button>
			</div>

			<div class="form-group">
				<button class="btn btn-primary btn-block"><b> BUAT NOTULENSI</b></button>
			</div>
		</form>


		<table class="table">
			<tr>
				<tr>Nama FIle</tr>
				<tr>Aksi</tr>
			</tr>
			@foreach($list_file as $item)
			<tr>
				<td>{{ucwords($item->nama_file)}}</td>
				<td><a href="{{url('x/jadwal-rapat',$item->rapat_dokumentasi_id)}}/hapus-file" onclick="return confirm('Yakin hapus berkas?')" class="btn btn-danger">Hapus</a></td>
			</tr>
			@endforeach
		</table>
	</div>
</div>
@else
<div class="card mt-3">
	<div class="card-body">
		<form action="{{url('x/jadwal-rapat',$detail->jadwal_id)}}/notulensi" method="post" enctype="multipart/form-data">
			@csrf
			<textarea name="notulensi_isi" id="summernote" placeholder="Catatan hasil rapat" class="form-control"></textarea>

			<div class="form-group">
				<div id="dynamicTableUntuk"></div>
				<button type="button" name="add" id="add_untuk"
				class="btn btn-sm btn-dark mb-3 mt-3"><i class="mdi mdi-file"></i> Tambah File</button>
			</div>

			<div class="form-group">
				<button class="btn btn-primary btn-block"><b> BUAT NOTULENSI</b></button>
			</div>
		</form>
	</div>
</div>
@endif

<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
<script type="text/javascript">
	var u = 0;

	$("#add_untuk").click(function() {

		++u;

		var isi_dasar = '<table class="table table-borderless">' +
		'<tr>' +
		' <td>' +
		'<input type="file" name="file[]" class="form-control">' +
		'</td>' +
		' <td>' +
		'<input type="text" name="nama_file[]" class="form-control"  placeholder="Nama File">' +
		'</td>' +
		'<td>' +
		'<button type="button" class="btn btn-danger btn-sm remove-tr-untuk"><i class="mdi mdi-close-circle"></i></button>' +
		'</td>' +
		'</tr>' +
		'</table>';

		$("#dynamicTableUntuk").append(isi_dasar);

	});

	$(document).on('click', '.remove-tr-untuk', function() {
		$(this).parents('tr').remove();
	});
</script>
@endsection
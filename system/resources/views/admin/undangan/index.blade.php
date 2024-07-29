@extends('template.base')
@section('content')

<div class="card">
	<div class="card-body">
		<h3>DATA AGENDA RAPAT PER PEGAWAI</h3>
		<p>List jadwal agenda rapat pegawai Dinas Pendidikan</p>
		<table class="table table-hover table-striped table-bordered">
			<thead>
				<tr class="bg-primary text-white">
					<th>No</th>
					<th>Nama Pegawai</th>
					<th>Agenda Rapat</th>
				</tr>
			</thead>

			<tbody>
				@foreach($list_pegawai as $item)
				<tr>
					<td>{{$loop->iteration}}</td>
					<td>
						{{ucwords($item->pegawai_nama)}} <br>
						NIP. {{ucwords($item->pegawai_nip)}}
					</td>
					<td>
						@foreach(App\Models\Peserta::where('status_notulensi',0)->where('peserta_pegawai_id',$item->pegawai_id)->get() as $p)
						<b> {{ucwords($p->rapat->rapat_judul)}} </b><br>
						&nbsp; <i class="mdi mdi-calendar"></i> {{$p->rapat->rapat_tanggal}} {{$p->rapat->rapat_waktu_mulai}} - {{$p->rapat->rapat_waktu_selesai}}<br>
						&nbsp; <i class="mdi mdi-map-marker"></i> {{ucwords($p->rapat->rapat_ruangan)}}<br>

						<br> <br>
						@endforeach
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>


@endsection
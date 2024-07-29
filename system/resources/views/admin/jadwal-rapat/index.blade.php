@extends('template.base')
@section('content')


<div class="card mt-3">
	<div class="card-body">
		<a href="{{url('admin/jadwal-rapat/create')}}" class="btn btn-primary "><i class="mdi mdi-forum"></i> Buat Rapat Baru</a>
	</div>
</div>


<div class="mt-3">
	<div class="row">
		@foreach($list_jadwal as $item)
		<div class="col-md-6">
			<div class="jumbotron shadow">
				<h1 class="display-4">#{{$item->rapat_kode}} || {{ucwords($item->rapat_judul)}}</h1>
				<p class="lead">{{$item->rapat_deskripsi}}</p>
				<hr class="my-4">
				<p>Jumlah Undangan : {{$jumlahUndangan}}  <br>
					<i class="mdi mdi-calendar"></i> Tanggal : {{$item->rapat_tanggal}} || Jam {{$item->rapat_waktu_mulai}} s/d {{$item->rapat_waktu_selesai}}
				
				</p>
				<a class="btn btn-primary btn-lg" href="{{url('admin/jadwal-rapat',$item->jadwal_id)}}/detail" role="button">Lihat Detail Rapat</a>
			  </div>
		</div>
		@endforeach
	</div>
</div>

@endsection
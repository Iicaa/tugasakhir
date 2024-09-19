@extends('template.base')
@section('content')


<div class="card mt-3">
	<div class="card-body">
		<center>
			<h3 class="text-primary">HISTORY RAPAT</h3>
		</center>
	</div>
</div>


<div class="mt-3">
	<div class="row">
		@foreach($list_peserta->sortByDesc('updated_at') as $item)
		<div class="col-md-6">
			<div class="jumbotron shadow">
				<h1 class="display-4">#{{$item->rapat->rapat_kode}} || {{ucwords($item->rapat->rapat_judul)}}</h1>
				<p class="lead">{{$item->rapat->rapat_deskripsi}}</p>
				<hr class="my-4">
				<p>
					<i class="mdi mdi-calendar"></i> Tanggal : {{$item->rapat->rapat_tanggal}} || Jam {{$item->rapat->rapat_waktu_mulai}} s/d {{$item->rapat->rapat_waktu_selesai}}
				
				</p>
				<a class="btn btn-primary btn-lg" href="{{url('x/jadwal-rapat',$item->rapat->jadwal_id)}}/detail" role="button">Lihat Detail Rapat</a>
			  </div>
		</div>
		@endforeach
	</div>
</div>
@endsection
@extends('template.base')
@section('content')
<script src="https://code.jsqr.de/jsqr-1.0.2-min.js"></script>
<div class="row">

    <div class="col-md-4 mt-3">
        <div class="card">
            <div class="card-body text-white shadow bg-primary body">
             <h3>Total Rapat </h3>
             <h1>{{$total}}</h1>
         </div>
     </div>
 </div>

 <div class="col-md-4 mt-3">
    <div class="card">
        <div class="card-body text-white shadow bg-danger ">
         <h3>Jadwal Mendatang </h3>
         <h1>{{$mendatang}}</h1>
     </div>
 </div>
</div>

<div class="col-md-4 mt-3">
    <div class="card">
        <div class="card-body text-white shadow bg-success ">
         <h3>Total Rapat Bulan Ini</h3>
         <h1>{{$bulan}}</h1>
     </div>
 </div>
</div>

</div>

<div class="row mt-3">
    <div class="col-md-8">
        <div class="mt-3">
            @foreach($list_rapat as $item)
            <div class="jumbotron shadow">
                <h1 class="display-4">#{{$item->rapat->rapat_kode}} || {{ucwords($item->rapat->rapat_judul)}}</h1>
                <p class="lead">{{$item->rapat->rapat_deskripsi}}</p>
                <hr class="my-4">
                <p>Jumlah Undangan : {{$jumlahUndangan}}<br>
                    <i class="mdi mdi-calendar"></i> Tanggal : {{$item->rapat->rapat_tanggal}} || Jam {{$item->rapat_waktu_mulai}} s/d {{$item->rapat_waktu_selesai}}

                </p> 
                <a class="btn btn-primary btn-lg" href="{{url('x/jadwal-rapat',$item->rapat->jadwal_id)}}/detail" role="button"><b>Lihat Detail Rapat</b></a> 
                @if($item->rapat->rapat_notulen_id == Auth::guard('pegawai')->user()->pegawai_id)
                <a class="btn btn-warning btn-lg" href="{{url('x/jadwal-rapat',$item->rapat->jadwal_id)}}/notulensi" role="button"> <b>  Buat Notulensi</b></a>
                @endif
            </div>

            @endforeach

        </div>
    </div>
</div>

@endsection

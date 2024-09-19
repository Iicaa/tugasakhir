@extends('template.base')
@section('content')

<div class="row">
  <div class="col-md-12 grid-margin">
    <div class="d-flex justify-content-between flex-wrap">
      <div class="d-flex align-items-end flex-wrap">
        <div class="mr-md-3 mr-xl-5">
          <h2>Selamat datang, {{ucwords(Auth::user()->nama)}}</h2>
          <p class="mb-md-0"></p>
        </div>
      </div>
    </div>
  </div>
</div>


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
        <a class="btn btn-primary btn-lg" href="{{url('admin/jadwal-rapat',$item->rapat->jadwal_id)}}/detail" role="button"><b>Lihat Detail Rapat</b></a> 
      

      </div>

      @endforeach

    </div>
  </div>
</div>
@endsection
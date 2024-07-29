@extends('template.base')
@section('content')

@if(Auth::guard('pegawai')->user()->pegawai_level == 2 AND $detail->rapat_bidang_id == Auth::guard('pegawai')->user()->pegawai_bidang)
<div class="card">
    <div class="card-body">
        <h3 class="mt-3">#{{$detail->rapat_kode}} || {{ucwords($detail->rapat_judul)}}
            <a href="{{url('x/jadwal-rapat',$detail->jadwal_id)}}/undang" class="btn btn-primary float-right"><i class="mdi mdi-send"></i> Kirim Undangan Lagi</a>


            <!-- Button trigger modal -->
            <button type="button" class="btn btn-success float-right mr-3" data-toggle="modal" data-target="#exampleModal">
                <i class="mdi mdi-qrcode-scan"></i> QR Absensi
            </button>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel"></h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="loadpage">

                    <center>
                        <h3>Absensi Kehadiran</h3>
                        {!!QrCode::size(150)->generate($codeGenerate)!!}
                        <br><br>
                    </center>
                </div>
            </div>
        </div>
    </div>
</h3>
</div>
</div>
@endif
<div class="row">

    <div class="col-md-7">
        <div class="card mt-3">
            <div class="card-body">
                <h3>#{{$detail->rapat_kode}} || {{ucwords($detail->rapat_judul)}}</h3>
                <b>Detail Undangan :</b>
                <p>{{$detail->rapat_deskripsi}}</p>

                <b>Jumlah Undangan : {{$countPeserta}} Orang</b> <br>
                  <a href="{{url($detail->file)}}" class="btn btn-dark btn-sm mt-3" download><i class="fa fa-download" ></i> Download Paparan</a> <br>

            </div>
        </div>


        <div class="card mt-3">
            <div class="card-body">
             <div class="row">
                 <div class="col-md-12">
                    <center>
                        <h3>HASIL NOTULENSI</h3>
                    </center>
                </div>
            </div>

            <div class="col-md-12">
                @if ($notulensi)
                {!! nl2br($notulensi->notulensi_isi) !!}
                @else
                <p>Notulensi tidak ditemukan.</p>
                @endif
            </div>


        </div>
    </div>

    <div class="card mt-3">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <center>
                        <h3>FILE/DOKUMENTASI KEGIATRAN</h3>
                    </center>
                </div>

                <div class="col-md-12">
                    <table class="table">
                        <thead>
                            <tr class="bg-secondary text-white">
                                <th>No</th>
                                <th>Nama File</th>
                                <th>Download</th>
                            </tr>
                        </thead>

                        @foreach($list_dokumentasi as $item)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{ucwords($item->nama_file)}}</td>
                            <td><a href="{{url('system/public/app')}}/{{$item->file}}" download="" target="_blank" class="btn btn-secondary btn-sm"><i class="mdi mdi-download"></i> Unduh</a></td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-md-5 mt-3">
    <div class="card">
        <div class="card-body">
           <h3>List Daftar Undangan</h3>
           @if(Auth::guard('pegawai')->user()->pegawai_level == 2 AND $detail->rapat_bidang_id == Auth::guard('pegawai')->user()->pegawai_bidang)
           <button type="button" class="btn float-right btn-secondary" data-toggle="modal" data-target="#UndangLagi">
              Tambah Undangan
          </button>
          @endif


          <!-- Modal -->
          <div class="modal fade" id="UndangLagi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div class="modal-body">
               <form action="{{url('x/jadwal-rapat',$detail->jadwal_id)}}/tambah-undangan" method="post">
                   @csrf
                   <div class="for-group mt-3">
                       <span>Nama </span>
                       <input type="text" name="pegawai_nama" class="form-control" required>
                   </div>

                    <div class="for-group mt-3">
                       <span>Email </span>
                       <input type="email" name="peserta_email" class="form-control" required>
                   </div>

                   <button class="btn mt-3 btn-primary">KIRIM UNDANG</button>
               </form>
            </div>
        </div>
    </div>
</div>


<table class="table" id="loadpageTable">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Peserta</th>
            <th>Status Kehadiran</th>
        </tr>
    </thead>

    <tbody>
        @foreach($list_undangan as $item)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{ucwords($item->pegawai_nama)}}</td>
            <td>
                @if($item->status_kehadiran == 0)
                <badge class="badge badge-danger">Belum Absensi</badge>      
                @else
                <badge class="badge badge-info">Absensi</badge>   
                @endif
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
</div>
</div>
</div>
</div>

<script src="http://code.jquery.com/jquery-latest.js"></script>
<script type="text/javascript">

    function loadpage(){
        var jadwalId = {!! json_encode($detail->jadwal_id) !!};

    // Menggunakan variabel jadwalId dalam URL untuk memuat konten dengan jQuery
        $('#loadpage').load("{{ url('x/jadwal-rapat/') }}" + '/' + jadwalId + '/detail' + ' #loadpage');
        $('#loadpage').load("{{ url('x/jadwal-rapat/') }}" + '/' + jadwalId + '/generate-code' + ' #loadpage');
    }
    setInterval( ()=>{
        loadpage();
    }, 30000);


    
</script>
@endsection
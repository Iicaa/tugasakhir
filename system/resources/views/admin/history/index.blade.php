@extends('template.base')
@section('content')


<div class="card mt-3">
    <div class="card-body">
      <h3>History Rapat</h3>
        <table class="table">
            <thead>
                <tr class="bg-primary text-white">
                    <th>No</th>
                    <th>Aksi</th>
                    <th>Nama Rapat</th>
                    <th>Waktu Rapat</th>
                    <th>Bidang Penyelenggara</th>
                </tr>
            </thead>
            <tbody>
                @foreach($list_jadwal as $item)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>
                        <div class="btn-group">
                            <a href="{{url('admin/jadwal-rapat',$item->jadwal_id)}}/detail" class="btn btn-sm btn-dark">Lihat</a>
                        </div>
                    </td>
                    <td>{{ucwords($item->rapat_judul)}}</td>
                    <td>
                        {{ucwords($item->rapat_tanggal)}} <br>
                        {{$item->rapat_waktu_mulai}} - {{$item->rapat_waktu_selesai}}
                    </td>
                    <td>{{ucwords($item->rapat_judul)}}</td>
                </tr>
                @endforeach
            </tbody>


            <tfoot>
                <tr class="bg-primary text-white">
                    <th>No</th>
                    <th>Aksi</th>
                    <th>Nama Rapat</th>
                    <th>Waktu Rapat</th>
                    <th>Bidang Penyelenggara</th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>

@endsection
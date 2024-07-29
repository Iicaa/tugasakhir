@extends('template.base')
@section('content')


<div class="card">
    <div class="card-body">
        <center>
            <h3>DATA PEGAWAI DINAS PENDIDIKAN</h3>
        </center>
    </div>
</div>

<div class="card mt-3">
    <div class="card-body">
        <a href="{{url('admin/data-pegawai/create')}}" class="btn btn-primary float-right">Tambah Data Pegawai</a>
    </div>
</div>


<div class="card mt-3">
    <div class="card-body">
        <!-- <a href="{{url('admin/data-pegawai/reset-semua')}}" class="btn btn-sm  mt-2 mb-2 float-right btn-danger" onclick="return confirm('Reset semua password ke default?')"><i class="mdi mdi-lock-reset"></i> Reset Password</a> -->
        <table class="table table-hover table-striped table-bordered">
            <thead>
                <tr class="text-center bg-primary text-white">
                    <th>No</th>
                    <th>Nama Pegawai</th>
                    <th>Status Kepegawaian</th>
                    <th>Jabatan</th>
                    <th>Tingkat/Gol</th>
                    <th>No Telp</th>
                    <th>Bidang</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($list_pegawai as $item)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>
                        {{ucwords($item->pegawai_nama)}} <br>
                        NIP. {{$item->pegawai_nip}}
                    </td>
                    <td>{{$item->pegawai_status}}</td>
                    <td>{{ucwords($item->pegawai_jabatan)}}</td>
                    <td>{{$item->pegawai_tingkat}}</td>
                    <td>{{$item->pegawai_wa}}</td>
                    <td>{{$item->bidang->bidang_nama}}</td>
                    <td class="text-center">
                        <div class="btn-group ">
                            <a href="{{url('admin/data-pegawai',$item->pegawai_id)}}/edit" class="btn btn-sm btn-success"><i class="mdi mdi-pencil"></i></a>
                            <a href="{{url('admin/data-pegawai',$item->pegawai_id)}}/delete" onclick="return confirm('Yakin hapus data ini?')" class="btn btn-sm btn-danger"><i class="mdi mdi-delete"></i></a>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>

            <tfoot>
                <tr class="text-center bg-primary text-white">
                    <th>No</th>
                    <th>Nama Pegawai</th>
                    <th>Status Kepegawaian</th>
                    <th>Jabatan</th>
                    <th>Tingkat/Gol</th>
                    <th>No Telp</th>
                    <th>Bidang</th>
                    <th>Aksi</th>
                </tr>
            </tfoot>
        </table>

        <div class="mt-3">
            <div class="float-right">
                {{$list_pegawai->links()}}
            </div>
        </div>
        
    </div>
</div>

@endsection
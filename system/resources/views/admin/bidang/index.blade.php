@extends('template.base')
@section('content')

<div class="card">
    <div class="card-body">
     <h3>Data Bidang Dinas Pendidikan</h3>

 </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Form Tambah Bidang</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
      <form action="{{url('admin/data-bidang')}}" method="POST">

        @csrf
        <div class="form-group">
            <span>Nama Bidang</span>
            <input type="text" class="form-control" required name="bidang_nama">
        </div>

        <button class="btn btn-primary btn-block">Tambah Bidang</button>
    </form>
</div>
</div>
</div>
</div>
{{-- end modal --}}

<div class="card mt-3">
    <div class="card-body">
        Data bidang di Dinas Pendidikan Kab. Ketapang
        <button type="button" class="btn btn-sm float-right mb-3 btn-primary" data-toggle="modal" data-target="#exampleModal">
       <b>+</b> Tambah Bidang
      </button>
        <table class="table table-bordered table-hover">
            <thead>
                <tr class="bg-primary text-white">
                    <th width="50px">No</th>
                    <th width="100px">Aksi</th>
                    <th>Nama Bidang</th>
                </tr>
            </thead>
            <tbody>
                @foreach($list_bidang as $item)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td><a href="{{url('admin/data-bidang',$item->bidang_id)}}/delete" onclick="return confirm('Yakin hapus data bidang ini?')" class="btn btn-sm btn-danger"><i class="mdi mdi-delete"></i></a></td>
                    <td>{{strtoupper($item->bidang_nama)}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection
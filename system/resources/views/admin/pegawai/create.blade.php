@extends('template.base')
@section('content')


<div class="card">
    <div class="card-body">
        <center>
            <h3>FORM TAMBAHA DATA PEGAWAI</h3>
        </center>
    </div>
</div>

<div class="card mt-3">
    <div class="card-body">
       <form action="{{url('admin/data-pegawai/create')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <span>NAMA PEGAWAI</span>
                    <input type="text" class="form-control" required minlength="1" name="pegawai_nama" placeholder="Nama Pegawai">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <span>NIP PEGAWAI</span>
                    <input type="text" class="form-control" required minlength="1" name="pegawai_nip" placeholder="NIP Pegawai">
                </div>
            </div>


            <div class="col-md-6">
                <div class="form-group">
                    <span>STATUS KEPEGAWAIAN</span>
                    <select name="pegawai_status" class="form-control" id="">
                        <option value="" hidden>-- Pilih Status Kepegawaian --</option>
                        <option value="PNS">PNS</option>
                        <option value="PPPK">PPPK</option>
                        <option value="HONORER">HONORER</option>
                    </select>
                </div>
            </div>


            <div class="col-md-6">
                <div class="form-group">
                    <span>JABATAN PEGAWAI</span>
                    <input type="text" class="form-control" required minlength="1" name="pegawai_jabatan" placeholder="Jabatan Pegawai">
                </div>
            </div>


            <div class="col-md-6">
                <div class="form-group">
                    <span>TINGKAT DAN GOLONGAN</span>
                    <input type="text" class="form-control" required minlength="1" name="pegawai_tingkat" placeholder="Jabatan Pegawai">
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <span>Bidang</span>
                    <select name="pegawai_level" class="form-control" id="" required>
                        <option value="" hidden>-- Pilih Bidang --</option>
                        @foreach($list_bidang as $bidang)
                        <option value="{{$bidang->bidang_id}}">{{ucwords($bidang->bidang_nama)}}</option>
                        @endforeach
                    </select>
                </div>
            </div>


            <div class="col-md-6">
                <div class="form-group">
                    <span>E-Mail Pegawai</span>
                    <input type="email" class="form-control" required minlength="1" name="email" placeholder="E-Mail Aktif Pegawai">
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <span>No WhatsApp</span>
                    <input type="number" class="form-control" required minlength="1" name="pegawai_wa" placeholder="Whatsapp">
                </div>
            </div>




            <div class="col-md-12">
                <button class="btn btn-primary float-right">SIMPAN</button>
            </div>


        </div>

    </form>
    </div>
</div>

@endsection
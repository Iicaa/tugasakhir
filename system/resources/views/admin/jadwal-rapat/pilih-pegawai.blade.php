@extends('template.base')
@section('content')

<div class="card">
    <div class="card-body">
        <center>
            <h3>PILIH PEGAWAI DIUNDANG</h3>
        </center>
    </div>
</div>

<div class="card mt-3">
    <div class="card-body">
        <form action="{{url('x/jadwal-rapat',$detail->jadwal_id)}}/pilih-pegawai" method="POST">
            @csrf

            <table class="table  table-borderless">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Pilih Pegawai</th>
                    </tr>
                </thead>

                @foreach ($list_pegawai as $item)
                    <tr>
                        <td>{{ucwords($item->pegawai_nama)}} <br>
                            {{$item->pegawai_nip}}
                        
                        </td>
                        <td><input type="text" class="form-control" value="{{$item->email}}" name="pegawai_email" readonly></td>
                        <td>
                            <input type="hidden" name="pegawai_id[]" value="{{$item->pegawai_id}}">
                            <input type="checkbox" name="pegawai_check_{{$item->pegawai_id}}" value="{{$item->pegawai_id}}">
                        </td>
                    </tr>
                @endforeach

                <tr>
                    <td colspan="2">
                        <button class="btn btn-primary btn-block">Kirim Undangan</button>
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>

@endsection
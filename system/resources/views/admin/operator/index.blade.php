@extends('template.base')
@section('content')

<div class="card">
	<div class="card-body">
		<center>
			<h3>
				Data Akun Operator <br>
				Dinas Pendidikan
			</h3>
		</center>
	</div>
</div>

<div class="row">
	<div class="col-md-12">
		<!-- Modal -->
		<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Akun Operator</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<form action="{{url('admin/akun-operator')}}" method="POST">
							@csrf
							<div class="form-group">
								<span>Bidang Operator</span>
								<select name="bidang_id" id="" class="form-control" required>
									<option value="" hidden>--Pilih Bidang--</option>
									@foreach($bidang as $item)
									<option value="{{$item->bidang_id}}">{{strtoupper($item->bidang_nama)}}</option>
									@endforeach
								</select>
							</div>

							<div class="form-group">
								<span>Pegawai</span>
								<select name="pegawai_id" id="" class="form-control" required>
									<option value="" hidden>--Pilih Bidang--</option>
									@foreach($pegawai->sortBy('pegawai_nama') as $item)
									<option value="{{$item->pegawai_id}}">{{strtoupper($item->pegawai_nama)}}</option>
									@endforeach
								</select>
							</div>

							<button class="btn btn-primary mt-3">BUAT AKUN</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- end modal -->
	<div class="col-md-12">
		<div class="card mt-3">
			<div class="card-body">
				<h3>Data Akun Operator Bidang</h3>
				<button type="button" class="btn btn-primary float-right mt-3 mb-3" data-toggle="modal" data-target="#exampleModal">
					<i class="mdi mdi-account-plus"></i> Akun Operator
				</button>

				<div class="table-responsive">
					<table class="table table-hover table-bordered table-striped">
						<thead>
							<tr class="bg-primary text-white">
								<th>No</th>
								<th>Nama Operator</th>
								<th>Bidang</th>
								<th>Email</th>
								<th>Aksi</th>
							</tr>
						</thead>
						@foreach($operator as $o)
						<tr>
							<td>{{$loop->iteration}}</td>
							<td>{{ucwords($o->pegawai_nama)}}</td>
							<td>{{ucwords($o->bidang->bidang_nama)}}</td>
							<td>{{$o->email}}</td>
							<td>
								<a href="{{url('admin/akun-operator',$o->pegawai_id)}}/non-aktifkan" class="btn btn-danger btn-sm" onclick="return confirm('Nonaktifkan akun?')"> Hapus Akun Operator</a>
							</td>
						</tr>
						@endforeach


					</table>
				</div>
			</div>
		</div>
	</div>
</div>


@endsection
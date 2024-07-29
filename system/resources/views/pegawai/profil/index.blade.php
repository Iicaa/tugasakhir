@extends('template.base')
@section('content')


<div class="card mt-3">
	<div class="card-body bg-danger">
		<center>
			<h3 class="text-white">Ganti Password</h3>
		</center>
	</div>
</div>

<div class="card">
	<div class="card-body">
		<form action="{{url('x/ganti-password')}}" method="post">
			@csrf
			<div class="row">
				<div class="col-md-6">
					<div class="form-grooup">
						<span>Password Baru</span>
						<input type="password" placeholder="Password Baru" name="new" required minlength="3" class="form-control">
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-grooup">
						<span>Konfirmasi Password Baru</span>
						<input type="password" placeholder="Konfirmasi Password Baru" required minlength="3" name="konfirmasi" class="form-control">
					</div>
				</div>

				<div class="col-md-12 mt-3">
					<button class="btn btn-danger">Ganti Password</button>
				</div>
			</div>
		</form>
	</div>
</div>

@endsection
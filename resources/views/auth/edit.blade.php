@extends('fontend')
@section('content')
<div class="col-md-12 row">
	<div class="col-md-3">
		@include('auth.menu_l')
	</div>
	<div class="col-md-9" align="left">
		@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
		<form method="POST" action="{{ route('user.update', ['user' => $user->id]) }}" nctype="multipart/form-data">
			@csrf
			<h4>
					<div class="col-md-4">
						รหัสเก่า:
					</div>
					<div class="col-md-8">   
						<input id="password" type="password" name="password_old" class="form-control">
					</div><br>
					<div class="col-md-4">
						กรอกรหัสผ่าน:   
					</div>
					<div class="col-md-8"> 
						<input id="password" type="password" name="password" class="form-control">
					</div><br>
					<div class="col-md-4">
						ยืนยันรหัสผ่านอีกครั้ง: 
					</div> 
					<div class="col-md-8"> 
						<input id="password-confirm" type="password" name="password_confirmation" class="form-control">
					</div>
			</h4>
			<button class="btn btn-primary">ยืนยัน</button>
		</form>
	</div>

</div>

@endsection
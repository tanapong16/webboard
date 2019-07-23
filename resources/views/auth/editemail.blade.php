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
		<form method="POST" action="{{ route('user.updateEmail', ['user' => $user->id]) }}" nctype="multipart/form-data">
			@csrf
			<h4>
					
					<div class="col-md-4">
					E-mail ใหม่:   
					</div>
					<div class="col-md-8"> 
					<input id="email" type="email" name="email" value="{{$user->email}}" class="form-control">
					</div>
					
			</h4>
			<div class="col-md-4">
			<button class="btn btn-primary">ยืนยัน</button>
		</div>
		</form>
	</div>

</div>

@endsection
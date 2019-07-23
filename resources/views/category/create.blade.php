@extends('fontend')
@section('content')
<h2>เพิ่ม Category</h2>
	@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form method="POST" action="{{ route('category.store') }}">
	@csrf

	<div class="form-group">
		<div class="col-md-3">
			ชื่อCategory:
		</div>
		<div class="col-md-7">
			<input type="text" name="name" class="form-control">
		</div>
	</div>
	<div class="form-group">
		<div class="col-md-3">
			คำอธิบาย:
		</div>
		<div class="col-md-7">
			<input type="text" name="explanation" class="form-control">
		</div>
	</div>
	<div class="col-md-3">
	<button class="btn btn-primary">บันทึกข้อมูล</button>
</div>
</form>

@endsection
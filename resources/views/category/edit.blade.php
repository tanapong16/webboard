@extends('fontend')
@section('content')
<h2>แก้ไขCategory</h2>
<form method="POST" action="{{ route('category.update',['category' => $category->category_id]) }}" nctype="multipart/form-data">
	@csrf
	<div class="form-group">
		<div class="col-md-3">
			ชื่อCategory:
		</div>
		<div class="col-md-7">
			<input type="text" name="name" class="form-control" value="{{$category->name}}">
		</div>
	</div>
	<div class="form-group">
		<div class="col-md-3">
			คำอธิบาย:
		</div>
		<div class="col-md-7">
			<input type="text" name="explanation" class="form-control" value="{{$category->explanation}}">
		</div>
	</div>
	<div class="col-md-3">
	<button class="btn btn-primary">ยืนยัน</button>
</div>
</form>
@endsection
@extends('fontend')
@section('content')
<h2>สร้าง Post</h2>
	@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form method="POST" action="{{ route('post.store') }}">
	@csrf
	<div class="form-group">
		<div class="col-md-3">
			ประเภท Post: {{$category->name}}
		</div>
			<input type="hidden" name="category_id" class="form-control" value="{{$category->category_id}}">
	</div>
	<div class="form-group">
		<div class="col-md-3">
			ชื่อผู้ Post: {{$user->name}}
		</div>
			<input type="hidden" name="user_id" class="form-control" value="{{$user->id}}">
	</div>
	<div class="form-group">
		<div class="col-md-3">
			ชื่อ Post:
		</div>
		<div class="col-md-7">
			<input type="text" name="title" class="form-control">
		</div>
	</div>
	<div class="form-group">
		<div class="col-md-3">
			รายละเอียด:
		</div>
		<div class="col-md-7">
			<textarea class="form-control" name="detail"></textarea>
		</div>
	</div>
	<div class="col-md-3">
	<button class="btn btn-primary">บันทึกข้อมูล</button>
</div>
</form>

@endsection
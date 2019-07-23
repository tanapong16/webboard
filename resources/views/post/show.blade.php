@extends('fontend')
@section('content')
<div class="col-md-12 modal-header" style="background-color: #8a8f96">
	<h4><a href="{{ route('post.index') }}">Webbard</a>->
		<a href="{{ route('post.list',['category' => $category->category_id]) }}">{{$category->name}}</a>->
		{{$post->title}}
	</h4>
</div>
<div class="col-md-12 modal-body mt-2" style="background-color: #dae4f5">
	<br>
	<div class="col-md-12 row">
		<div class="col-md-3">
			<h4>ผู้โพสต์: <a href="{{route('user.show',['user' => $post->user->id])}}">{{$post->user->name}}</a></h4><br>
			จำนวนกระทู้:

		</div>
		<div class="col-md-9">
			<h4>{{$post->detail}}</h4>
		</div>
	</div>
</div>
@foreach($comment as $cmt)
<div class="col-md-12 modal-body mt-2" style="background-color: #dae4f5">
	<br>
	<div class="col-md-12 row">
		<div class="col-md-3">
			<h4>ผู้ตอบ: <a href="{{route('user.show',['user' => $cmt->user->id])}}">
				{{$cmt->user->name}}
			</a></h4><br>
			จำนวนกระทู้: {{$cmt->user->comment->count()}} 
		</div>
		<div class="col-md-9">
			<h4>{{$cmt->detail}}</h4>
		</div>
	</div>
</div>
@endforeach

<form method="POST" action="{{ route('comment.store') }}">
	@csrf
	<div class="col-md-12 modal-body mt-2" style="background-color: #888a8f">
		@if (Auth::check()) 
		@if ($errors->any())
		<div class="alert alert-danger">
			<ul>
				@foreach ($errors->all() as $error)
				<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
		@endif
		<textarea class="form-control" name="detail"></textarea>
		<button class="btn btn-primary mt-1">เพิ่มComment</button>
		<input type="hidden" name="user_id" value="{{ Auth::user()->id}}">
		<input type="hidden" name="post_id" value="{{$post->post_id}}">
	</div>
</form>
@endif
@endsection
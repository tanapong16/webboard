{{-- @php
 dd($user->user_id->toArray());	
 @endphp --}}

 @extends('fontend')
 @section('content')
<div class="row">
	<div class="col-md-3">
		@include('auth.menu_l')
	</div>


{{-- @php
dump($us->toArray());
@endphp --}}

	<div class="col-md-9">

		{{$comment->links()}}

		<div class="row">
			@foreach($comment as $comments)
			<div class="col-md-12 mt-2" align="left" style="background-color: #c8d3e6">
				<div class="row">
					<div class="col-md-6" align="left">
						<a href="{{ route('post.list',['category' => $comments->post->category->category_id]) }}">{{$comments->post->category->name}}</a> >> 
						<a href="{{ route('post.show',[
						'post' => $comments->post->post_id,
						'category' => $comments->post->category->category_id]) }}">
						{{$comments->post->title}}
						</a>
					</div>
					<div class="col-md-6" align="right">
						เมื่อ: {{$comments->created_at->locale('th_TH')->isoFormat('lll')}}
					</div> 
				</div>
				<div class="row">
					<div class="col-md-12" align="left">
						<h4>{{$comments->detail}}</h4>
					</div>
				</div>
			</div>

			@endforeach
		</div>
	</div>
</div>
@endsection

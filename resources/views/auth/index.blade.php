@extends('fontend')
@section('content')
<div class="col-md-12 row">
	<div class="col-md-3">
@include('auth.menu_l')
	</div>
<div class="col-md-9" >
	<h4>ชื่อ: {{$user->name}}<br>
		กระทู้: {{$user->comment_count}}<br>
		วันที่สมัครสมาชิก: {{$user->created_at->locale('th_TH')->isoFormat('lll')}}<br>
		ใช้งานล่าสุด: {{$user->last_login->locale('th_TH')->isoFormat('lll')}}
	</h4>
</div>

</div>

@endsection
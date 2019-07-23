@extends('fontend')
@section('content')
<center>
<div class="col-md-8">
<div class="modal-body" style="background-color: #8a8f96" align="left">
	@foreach($user as $user)
<h3 align="left">ข้อมูลของ: {{$user->name}}</h3>
<hr>
<h4>
ชื่อ: {{$user->name}} <br>
กระทู้: {{$user->comment->count()}}<br>
วันที่สมัครสมาชิก: {{$user->created_at->locale('th_TH')->isoFormat('LLL')}}<br>
วันที่ใช้งานล่าสุด: {{$user->last_login->locale('th_TH')->isoFormat('lll')}}

</h4> 
@endforeach
</div>
</div>
</center>
@endsection
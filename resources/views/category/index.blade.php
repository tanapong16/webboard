{{-- @php
	dd($category->toArray());	
@endphp --}}
@extends('fontend')
@section('content')
<div class="col-md-12 modal-header" style="background-color: #8a8f96">
   <h3>Category</h3>
</div>
<div class="col-md-12">
	<a href="{{ route('category.create') }}" class="btn btn-primary mt-2">เพิ่มข้อมูล</a>
	
    <table class="table mt-2" style="width: 100%" border="2">
        <tr>
            <th width="10%">No.</td>
            <th width="30%">Category</td>
            <th width="30%">คำอธิบาย</td>
           	<th width="10%">แก้ไข</td>
           	<th width="10%">ลบ</td>

        </tr>
        @foreach($category as $cat)
        <tr>
        	<td>{{$cat->category_id}}</td>
        	<td>{{$cat->name}}</td>
        	<td>{{$cat->explanation}}</td>
        	<td align="center">
        		<a href="{{ route('category.edit',['category_id' => $cat->category_id]) }}" class="btn btn-warning">แก้ไข</a>
        	</td>
        	<td align="center">
        		<form method="POST" action="{{ route('category.destroy',['category_id' => $cat->category_id]) }}" onsubmit="return confirm('คุณต้องการที่จำลบข้อมูลใช่หรือไม่?')">
        			@csrf
        			@method('DELETE')
        			<button class="btn btn-danger">ลบ</button>
        		</form>
        	</td>
        </tr>
        @endforeach
    </table>
</div>
@endsection
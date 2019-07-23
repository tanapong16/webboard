
@extends('fontend')
@section('content')
<div class="col-md-12 modal-header" style="background-color: #8a8f96">
   <h4><a href="{{ route('post.index') }}">Webbard</a>->
    {{$category->name}} 
</h4>
</div>
<div class="col-md-12">
    @if (Auth::check()) 
    <a href="{{ route('post.create',['category' => $category->category_id, 'user' => Auth::user()->id]) }}" class="btn btn-primary btn-sm">
        สร้างPost
    </a> 
    @endif
    {{$post->links()}}
    <table class="table mt-2" style="width: 100%" border="1">
        <thead style="background-color: #dae5f7">
            <tr>
                <th width="40%">หัวข้อ</th>
                <th width="20%">ผู้โพสต์</th>
                <th width="15%">จำนวนผู้ตอบ</th>
                <th width="25%">กระทู้ล่าสุด</th>
            </tr>
        </thead>
        @foreach($post as $po)
        <tr>
        {{-- @php
            dump($po);
            @endphp --}}
            <td><a href="{{ route('post.show',['post' => $po->post_id,'category' => $po->category->category_id]) }}">
                {{str_limit($po->title, 100)}}</a></td>
                <td><a href="{{route('user.show',['user' => $po->user->id])}}">{{$po->user->name}}</a></td>
                <td>{{$po->comment->count()}}</td>
                <td>@if($po->dateComment) 
                    ตอบเมื่อ:
                    {{$po->dateComment->created_at->locale('th')->isoFormat('lll')}}

                    <br>
                    โดย:<a href="{{route('user.show',['user' => $po->user->id])}}"> {{$po->dateComment->user->name}}</a>
                    @endif
                </td>
            </tr>
            @endforeach
        </table>
    </div>
    @endsection
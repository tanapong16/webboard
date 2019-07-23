{{-- @php
dd(Auth::user());    
@endphp
--}}

@extends('fontend')

@section('content')
<div class="col-md-12 modal-header" style="background-color: #8a8f96">
   <h3> All Post</h3>
</div>
<div class="col-md-12">
    <table class="table mt-2" style="width: 100%" >
        @foreach($post as $po)
        @if(isset($po->category->category_id) && !empty($po->category->category_id)) 
        <tr>
            <td width="50%">
                
                -><a href="{{ route('post.show',['post' => $po->post_id,
                'category' => $po->category->category_id]) }}">
                {{str_limit($po->title, 100)}}
         
            </a>
            
        </td>

        <td width="25%">
         <a href="{{ route('post.list',['category' => $po->category->category_id]) }}">{{str_limit($po->category->name, 100)}}</a>
     </td>
     <td width="25%">{{$po->created_at->locale('th_TH')->isoFormat('lll')}}</td>
 </tr>  
  @endif
 @endforeach
</table>
</div>
<div class="col-md-12 modal-header" style="background-color: #8a8f96">
   <h3>Category</h3>
</div>
<div class="col-md-12">
    <table class="table mt-2" style="width: 100%" >
        @foreach($category as $cat)
     {{--   @php
             dump($cat->userComment);
        @endphp
        --}}
        <tr>

            <td width="50%">-><a href="{{ route('post.list',['category' => $cat->category_id]) }}">
                {{str_limit($cat->name,100)}}</a><br>
                {{str_limit($cat->explanation,100)}}</td>

                <td width="25%">จำนวนกระทู้: {{$cat->count_comment_count}} <br>

                    จำนวนหัวข้อ: {{$cat->post_count}}</td>

                    <td width="25%">
                        @if($cat->userComment)
                        ตอบกระทู้ล่าสุดโดย: <a href="{{route('user.show',['user' => $po->user->id])}}"> 
                            {{$cat->userComment->user->name}} 
                        </a>
                        <br>
                        @if(isset($cat->category_id) && !empty($cat->category_id)) 
                        หัวข้อ: <a href="{{ route('post.show',['post' => $cat->userComment->post->post_id,
                        'category' => $cat->category_id]) }}">  
                        {{str_limit($cat->userComment->post->title, 10)}} 
                        @endif
                       
                    </a>
                    <br>
                    เมื่อวันที่: {{$cat->userComment->created_at->locale('th')->isoFormat('lll')}}
                    @endif
                </td>
            </tr> 
            @endforeach
        </table>
    </div>
    @endsection 

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UserRequest;
use App\Http\Requests\editEmailRequest;

class EditUserController extends Controller
{
     public function index($id)
    {
    	$user = User::withCount('comment')
        ->find($id);
    	//dd($user->last_login);

        return view('auth.index',['user' => $user]);
    }
     public function edit($id)
    {	$user = User::find($id);
    	// dd($user->toArray());
        return view('auth.edit',['user' => $user]);
    }
    public function update(UserRequest $request,User $user){
        //dd('dsadfsafasf');
        // $user = User::find($id);
        // dd($user->toArray());
         $user = User::find(Auth::user()->id);
        if(Hash::check($request->password_old, $user->password)){
            $user->password = bcrypt(request('password'));
            $user->save();
            return redirect()->route('user.index',['user' => $user]);
        }
       

    }
    public function editEmail ($id){
        $user = User::find($id);
        return view('auth.editemail',['user' => $user]);

    }
    public function updateEmail(editEmailRequest $request,User $user){

        $user->email = request('email');
        $user->save();
        return redirect()->route('user.editEmail',['user' => $user]);
    }

    public function show(User $user){

        $user = User::with('comment')
        ->find($user);
        //dd($user->toArray());
        return view('auth.show',['user' => $user]);
    }
    public function comment(User $user){

        //dd($user->id);

        $comment = Comment::with('post' ,'user')
        ->where('user_id' ,$user->id)
        ->orderBy('comment_id', 'desc')
        ->paginate(10);
        //dd($user->id); 
        return view('auth.comment',[
            'user' => $user,
            'comment' => $comment
        ]);
    }
}

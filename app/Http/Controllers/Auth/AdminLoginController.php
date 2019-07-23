<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class AdminLoginController extends Controller
{
	public function __construct(){
		$this->middleware('guest:admin');
	}
   	public function showLoginForm(){
   		return view('auth.admin-login');
   	}
   	public function Login(Request $request){
   		$this->validate($request,[
   			'username' => 'required',
   			'password' => 'required'
   		]);
   		// dd(Auth::guard()->attempt(['username' => $request->username, 'password' => $request->password], $request->remember));
   		if (Auth::guard('admin')->attempt(['username' => $request->username, 'password' => $request->password], $request->remenber)) {
   		 	return redirect()->route('admin.dashboard');
   		 } 
   		return redirect()->back()->withInput($request->only('username', 'remenber'));
   	}

}

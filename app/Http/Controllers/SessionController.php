<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionController extends Controller
{

	public function __construct(){
		$this->middleware('guest')->except('logout');
	}
    public function create(){

    	return view('users.login');

    }

    public function store(){

    	if(!auth()->attempt(request(['email','password']))){

    		return back()->withErrors(['message'=>'Please Check Your Email again']);

    	}
    	return redirect('/posts');

    }

    public function logout(){

    	\Auth::logout();
    	return redirect('/posts')->with('logout','You are Logout ');
    	
    }
}

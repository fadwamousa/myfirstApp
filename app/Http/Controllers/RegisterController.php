<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Mail\WelcomeEmail;
class RegisterController extends Controller
{
    public function create(){

    	return view('users.register');
    }

    public function store(Request $request){
    	//validate 
    	$this->validate(Request(),[
    		'name'=>'required',
    	    'email'=>'email|required',
    	    'password'=>'required']);

    	//store
    	$user = User::create(['name'=>request('name'),'email'=>request('email'),'password'=>bcrypt(request('password'))]);
        
        \Auth::login($user);

        \Mail::to($user)->send(new WelcomeEmail($user));
    	//redirect
    	return redirect('/posts')->with('userCreate','The user is created');
    }
}

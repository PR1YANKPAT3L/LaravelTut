<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Validator;
use \App\User;
use Auth;

class LoginController extends Controller
{
    public function validateLogin(Request $request)
    {
    	$validator = Validator::make($request->all(), [
    		'email' => 'required',
    		'password' => 'required'
    	]);

    	if($validator->fails())
    	{
    		return back()->withErrors($validator);
    	} else {
    		if(Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')])) {
    			return redirect()->intended('dashboard');
    		} else {
    			return back()->withErrors(['error' => 'Account not found!']);
    		}
    	}
    }

    public function validateRegistration(Request $request)
    {
    	$validator = Validator::make($request->all(), [
    		'name' => 'required',
    		'email' => 'required|unique:users',
    		'password' => 'required|min:5|max:20'
    	]);

    	if($validator->fails())
    	{
    		return back()->withErrors($validator);
    	} else {
    		$user = new User();
    		$user->email = $request->input('email');
    		$user->name = $request->input('name');
    		$user->password = bcrypt($request->input('password'));
    		$user->save();

    		return back()->with([
    			'success' => 'Registration successful!'
    		]);
    	}
    }
}

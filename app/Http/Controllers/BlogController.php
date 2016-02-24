<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Validator;
use App\Blog;
use Auth;

class BlogController extends Controller
{
    public function validateNewBlog(Request $request){
    	$rules = array(
    		'title' => 'required',
    		'content'=> 'required'
    	);
    	$validator = Validator::make($request->all(), $rules);

    	if($validator->fails())
    	{
    		return back()->withErrors($validator);
    	}
    	else {
    		$blog = new Blog();
    		$blog->title = $request->input('title');
    		$blog->content = $request->input('content');
    		Auth::user()->blog()->save($blog);

    		return back()->with([
    			'success'=> 'New Blog Created'
    			]);
    	}

    }

}

<?php

namespace App\Http\Controllers;
use App\Models\Post;

class DashbordController extends Controller {


	public function __construct(){

		$this->middleware('auth');
	}
	public function index() {
		// dd(auth()->user()->post); // show all post that make with a user and they have relationship
		// dd(Post::find(12)->created_at);
		return view('dashbord');
	}
}

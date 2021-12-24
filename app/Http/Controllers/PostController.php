<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;



class PostController extends Controller {
	//

	public function __construct(){
		$this->middleware(['auth'])->only(['post','destroy']);
		// $this->middleware(['auth'])->except(['index','show']);
	}


	public function index() {
	// {{--first way--}}
	 $post = Post::orderBy('created_at','desc')->with(['user','likes'])->Paginate(20);
	//  second way to rverse data
		// $post = Post::latest()->with(['user','likes'])->Paginate(20);
	////	////
		return view('posts.index',["posts" => $post]);
	}


	public function show(Post $post){
		return view('posts.show',[
			'post'=>$post,
		]);
	}

	public function post(Request $req) {

		$this->validate($req, [

			'body' => 'required',
		]);

		$req->user()->posts()->create([

			// user_id get value auto
			'body'=>$req->body

		]);
		return back();
	}


	public function delete(Post $post){
		if($post->ownedBy(auth()->user())){
			$post->delete();
		}
		return back();
	}
}

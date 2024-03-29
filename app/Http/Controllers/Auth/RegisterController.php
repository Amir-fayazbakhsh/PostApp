<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller {

	public function __construct() {

		$this->middleware('guest');
	}

	//

	public function index() {

		return view('Auth.register');

	}
	function register(Request $req) {

		$this->validate($req, [

			'name' => 'required|max:255',
			'username' => 'required|max:255',
			'email' => 'required|email|max:255|unique:users',
			'password' => 'required|confirmed',

		]);

		User::create([

			'name' => $req->name,
			'username' => $req->username,
			'email' => $req->email,
			'password' => Hash::make($req->password),

		]);

		auth()->attempt($req->only('email', 'password')); ///auth in helper

		return redirect("dashbord");
	}
}

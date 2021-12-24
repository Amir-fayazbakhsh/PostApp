<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller {
	//

	public function __construct() {

		$this->middleware('guest');
	}

	public function index() {

		return view('Auth.login');
	}

	public function login(Request $req) {

		$this->validate($req, [

			'email' => 'required|email',
			'password' => 'required',

		]);

		if (!auth()->attempt($req->only('email', 'password'), $req->remember)) {

			return back()->with('status', 'email or password is wrong');
		}

		return redirect("dashbord");
	}
}

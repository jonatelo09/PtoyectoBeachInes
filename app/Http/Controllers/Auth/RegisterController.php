<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request as Req;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller {
	/*
		    |--------------------------------------------------------------------------
		    | Register Controller
		    |--------------------------------------------------------------------------
		    |
		    | This controller handles the registration of new users as well as their
		    | validation and creation. By default this controller uses a trait to
		    | provide this functionality without requiring any additional code.
		    |
	*/

	use RegistersUsers;

	/**
	 * Where to redirect users after registration.
	 *
	 * @var string
	 */
	protected $redirectTo = '/home';

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct() {
		$this->middleware('guest');
	}

	/**
	 * Get a validator for an incoming registration request.
	 *
	 * @param  array  $data
	 * @return \Illuminate\Contracts\Validation\Validator
	 */
	protected function validator(array $data) {
		return Validator::make($data, [
			'username' => ['required', 'string', 'max:255'],
			'firstname' => ['required', 'string', 'max:255'],
			'lastname' => ['required', 'string', 'max:255'],
			'sex' => ['required', 'string', 'max:15'],
			'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
			'phone' => ['required', 'string', 'max:10', 'unique:users'],
			'password' => ['required', 'string', 'min:8', 'confirmed'],
			'address' => ['required', 'string', 'min:10'],
		]);
	}

	/**
	 * Create a new user instance after a valid registration.
	 *
	 * @param  array  $data
	 * @return \App\User
	 */
	protected function create(array $data) {
		return User::create([
			'username' => $data['username'],
			'firstname' => $data['firstname'],
			'lastname' => $data['lastname'],
			'sex' => $data['sex'],
			'email' => $data['email'],
			'phone' => $data['phone'],
			'address' => $data['address'],
			'password' => Hash::make($data['password']),
		]);
	}

	public function showRegistrationForm(Req $request) {
		$name = $request->input('name');
		$email = $request->input('email');
		return view('auth.register')->with(compact('name', 'email'));
	}

	public function mostrarUsuarios() {
		$users = User::paginate(5);

		return view('admin.users.user')->with(compact('users'));
	}
}

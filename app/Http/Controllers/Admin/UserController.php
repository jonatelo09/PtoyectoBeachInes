<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller {
	public function index() {
		$title_page = "Usuarios";
		$users = User::paginate(5);
		return view('admin.users.user')->with(compact('users', 'title_page'));
	}

	public function profile() {
		$users = User::all();
		return view('users.profile')->with(compact('users'));
	}

	public function create() {
		return view('admin.users.create');
	}

	public function store(Request $request) {
		$messages = [
			'username.required' => 'Es necesario ingresar un nombre para el usuario',
			'username.min' => 'El nombre del usuario debe tener al menos 6 caracteres',
			'email.required' => 'La description corta es obligatorio',
			'phone.max' => 'La descripcion corta admite solo 30 caracteres',
		];
		$rules = [
			'username' => 'required|min:3',
			'phone' => 'required|max:10',
		];

		$this->validate($request, $rules, $messages);

		$user = new User();
		$user->username = $request->input('username');
		$user->firstname = $request->input('firstname');
		$user->lastname = $request->input('lastname');
		$user->sex = $request->input('sex');
		$user->email = $request->input('email');
		$user->phone = $request->input('phone');
		$user->address = $request->input('address');
		$user->admin = $request->input('admin');
		$user->password = bcrypt($request->input('password'));
		$user->save();

		return redirect()->route('users');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id) {
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id) {

		$title_page = "Usuarios";
		$title_hab = "Editar usuario";
		$user = User::find($id);
		return view('admin.users.edit', compact('user','title_page', 'title_hab'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, User $user) {
		$user->update($request->all());

		return redirect()->route('users', $user->id);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Request $request, User $user) {
		$user->delete();
		return back()->with('info', 'Usuario eliminado correctamente');
	}
}
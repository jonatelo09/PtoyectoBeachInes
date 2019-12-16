<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

class PaginaController extends Controller {
	// public function __construct()
	// {
	//     $this->middleware('auth');//,['only'=>'huesped']

	// }

	public function inicio() {
		$title_page = "Bienvenidos";
		return view('paginas.inicio', compact('title_page'));

	}

	public function restaurante() {
		$title_page = "Restaurante Bar";
		return view('paginas.restaurante', compact('title_page'));

	}
	public function servicio() {
		$title_page = "Servicios";
		return view('paginas.servicios', compact('title_page'));

	}
	public function galeria() {
		$title_page = "Galeria";
		return view('paginas.galeria', compact('title_page'));

	}
	public function ubicacion() {
		$title_page = "Ubicación";
		return view('paginas.ubicacion', compact('title_page'));

	}
	public function reserva() {
		$title_page = "Reservaciones";
		return view('paginas.reservaciones', compact('title_page'));

	}
	public function puerto_escondido() {
		$title_page = "Puerto Escondido";
		return view('paginas.puerto_escondido', compact('title_page'));

	}
	public function contacto() {
		$title_page = "Contacto";
		return view('paginas.contacto', compact('title_page'));

	}

	public function iniciar() {
		$title_page = "Inicio de sesión";
		return view('auth.loginH', compact('title_page'));

	}

	public function huesped() {
		$title_page = "Huesped";
		return view('plantilla_huesped.plantilla_huesped', compact('title_page'));

	}

	public function suite() {

		$title_page = "Suites";
		$title_hab = "Suites";

		$habitacion = DB::table('products as pro')
			->join('categories as cat', 'pro.category_id', '=', 'cat.id')
			->select('pro.id', 'pro.name', 'pro.price as temprecio', 'pro.descripcion', 'pro.img', 'pro.incluye', 'cat.name_cat as nomCategoria')
			->where('pro.condicion', '=', 1)
			->where('pro.category_id', '=', 1)
			->paginate(10);
		//dd($habitacion);
		return view('paginas.habitacionessuite', compact('habitacion', 'title_page', 'title_hab'));

	}

	public function estandar() {

		$title_page = "Habitaciones Estándar";
		$title_hab = "Estándar";

		$habitacion = DB::table('products as pro')
			->join('categories as cat', 'pro.category_id', '=', 'cat.id')
			->select('pro.id', 'pro.name', 'pro.descripcion', 'pro.img', 'pro.incluye', 'pro.price as temprecio', 'cat.name_cat as nomCategoria')
			->where('pro.category_id', '=', 3)
			->where('pro.condicion', '=', 1)
			->paginate(10);
		return view('paginas.habitacionessuite', compact('habitacion', 'title_page', 'title_hab'));
	}

	public function departamento() {

		$title_page = "Departamentos";
		$title_hab = "Departamentos";

		$habitacion = DB::table('products as pro')
			->join('categories as cat', 'pro.category_id', '=', 'cat.id')
			->select('pro.id', 'pro.name', 'pro.descripcion', 'pro.img', 'pro.incluye', 'pro.price as temprecio', 'cat.name_cat as nomCategoria')
			->where('pro.category_id', '=', 2)
			->where('pro.condicion', '=', 1)
			->paginate(10);

		return view('paginas.habitacionessuite', compact('habitacion', 'title_page', 'title_hab'));
	}

	public function bungalow() {

		$title_page = "Bungalows";
		$title_hab = "Bungalows";

		$habitacion = DB::table('products as pro')
			->join('categories as cat', 'pro.category_id', '=', 'cat.id')
			->select('pro.id', 'pro.name', 'pro.descripcion', 'pro.img', 'pro.incluye', 'pro.price as temprecio', 'cat.name_cat as nomCategoria')
			->where('pro.category_id', '=', 4)
			->where('pro.condicion', '=', 1)
			->paginate(10);
		return view('paginas.habitacionessuite', compact('habitacion', 'title_page', 'title_hab'));

	}

}

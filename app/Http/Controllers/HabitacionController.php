<?php

namespace App\Http\Controllers;

use App\Categoria;
use App\Http\Requests\HabitacionRequest;
use App\Precio;
use App\Product;
use Illuminate\Http\Request;

//use DB;

class HabitacionController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */

	public function __construct() {

		// $this->middleware('admin',['only'=>'index','create','show','store','edit','store','destroy','confirm']);
		$this->middleware('admin');

	}

	public function index(Request $request) {

		if ($request) {

			$title_page = "Habitaciones";
			$title_hab = "Suites";
			$query = trim($request->get('searchText'));

			/*$habitacion = Product::join('categories as cat', 'products.category_id', '=', 'cat.id')
					->select('products.id', 'products.name', 'products.descripcion', 'products.img', 'products.incluye', 'cat.name_cat as nomCategoria', 'products.price as temprecio')
					->where('products.name', 'LIKE', '%' . $query . '%')
					->where('products.condicion', '=', 1)
				//->get()
			*/
			$habitacion = Product::join('categories as cat', 'products.category_id', '=', 'cat.id')
				->select('products.id', 'products.name', 'products.descripcion', 'products.img', 'products.incluye', 'cat.name_cat as nomCategoria', 'products.price as temprecio')
				->where('products.name', 'LIKE', '%' . $query . '%')
				->where('products.condicion', '=', 1)
			//->get()
				->paginate(8);

			return view('habitaciones.index', compact('habitacion', 'title_page', 'title_hab', 'query'));
		}

	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		$categs = Categoria::all();
		$precs = Precio::all();
		$title_page = "Habitaciones";
		$title_hab = "Hab";

		return view('habitaciones.create', compact('categs', 'precs', 'title_page', 'title_hab'));

	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(HabitacionRequest $request) {
		/*valida si hay un archivo tipo imagen*/
		if ($request->hasFile('file_array')) {

			$file = $request->file('file_array');
			$rut = "img/suite/";
			$images = array();

			/*Recorre los datos de array de imagenes*/
			foreach ($file as $fil) {
				$name = $rut . $fil->getClientOriginalName();
				$name1 = $fil->getClientOriginalName();
				$fil->move(public_path() . '/img/suite', $name1);
				$images[] = $name;
			}

			$arrayimg = json_encode($images, JSON_UNESCAPED_SLASHES); // eliminar las barras
		} //Fin If
		//dd($arrayimg);

		$incluyearray = $request->incluye; //trae array de incluye
		$incluir = array();

		foreach ($incluyearray as $key => $value) {

			if (count($incluyearray[$key]) >= 2) {

				$datos = $value;
				$incluir[] = $datos;
			}
		}
		$json_incluye = json_encode($incluir);
		//dd($json_incluye);

		/*Lllena el array para el campo incluye*/
		$arraydes = ["descrip" => $request->descripcion, "can_p" => $request->cantidad_personas, "can_c" => $request->cantidad_camas];
		$datosdescripcion = json_encode($arraydes); //Convierte en array la variable de incluye

		/*Registra los datos en la DB*/
		$Habitacion = new Habitacion;
		$Habitacion->id_categoria = $request->id_categoria;
		$Habitacion->id_precio = $request->id_precio;
		$Habitacion->nombre = $request->nombre;
		$Habitacion->descripcion = '[' . $datosdescripcion . ']';
		$Habitacion->incluye = $json_incluye;
		$Habitacion->img = $arrayimg;
		$Habitacion->condicion = '1';
		$Habitacion->save();

		/*Retorna a la vista index de habitacionesadmin*/
		return redirect()->route('habitacionesadmin.index')->with('datos', '¡Registro guardado exitosamente!');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Habitacion  $habitacion
	 * @return \Illuminate\Http\Response
	 */
	public function show($id) {

		// $Habitacion =Habitacion::findOrFail($id);
		// return view('habitaciones.show',compact('Habitacion'));
		$title_page = "Visualizar Habitacion";
		$title_hab = "Hab";
		$habitacion = Habitacion::findOrFail($id);

		return view('habitaciones.show', compact('habitacion', 'title_page'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Habitacion  $habitacion
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id) {
		$title_page = "Editar Habitacion";
		$title_hab = "Hab";
		$habitacion = Habitacion::findOrFail($id);

		return view('habitaciones.edit', compact('habitacion', 'title_page'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\Habitacion  $habitacion
	 * @return \Illuminate\Http\Response
	 */
	public function update(HabitacionRequest $request) {
		$Habitacion = new Habitacion;

		$labels = ["descrip" => $request->id_categoria, "can_p" => $request->id_precio, "can_c" => $request->nombre];
		dd($labels);

		$Habitacion->id_habitacion = $request->id_habitacion;
		$Habitacion->id_categoria = $request->id_categoria;
		$Habitacion->id_precio = $request->id_precio;
		$Habitacion->nombre = $request->nombre;
		$Habitacion->descripcion = $request->descripcion;
		$Habitacion->incluye = $request->incluye;
		$Habitacion->img = $request->img;

		$Habitacion->save();
		return redirect()->route('habitacionesadmin.index')->with('datos', '¡Registro actualizado exitosamente!');

	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Habitacion  $habitacion
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id) {
		$Habitacion = Habitacion::findOrFail($id);

		$Habitacion->condicion = '0';
		$Habitacion->update();

		return redirect()->route('habitacionesadmin.index')->with('datos', '¡Registro eliminado exitosamente!');
	}
	public function confirm($id) {

		$title_page = "Confirmar Eliminar";
		$Habitacion = Habitacion::findOrFail($id);

		return view('habitaciones.confirm', compact('Habitacion', 'title_page'));
	}

	public function habeliminadas(Request $request) {
		if ($request) {

			$title_page = "Habitaciones Eliminadas";
			$title_hab = "Suites";
			$query = trim($request->get('searchText'));

			$habitacion = Habitacion::join('categoria', 'habitacion.id_categoria', '=', 'categoria.id_categoria')
				->join('precio', 'habitacion.id_precio', '=', 'precio.id_precio')
				->select('habitacion.id_habitacion', 'habitacion.nombre', 'habitacion.descripcion', 'habitacion.img', 'habitacion.incluye', 'categoria.nombre as nomCategoria', 'precio.temporada_baja as temprecio')
				->where('habitacion.nombre', 'LIKE', '%' . $query . '%')
				->where('habitacion.condicion', '=', 0)
			//->get()
				->paginate(8);

			return view('habitaciones.eliminadas', compact('habitacion', 'title_page', 'title_hab', 'query'));
		}

	}

	public function confirmActivar($id) {

		$title_page = "Confirmar Activar Habitación";
		$Habitacion = Habitacion::findOrFail($id);

		return view('habitaciones.confirmaractivar', compact('Habitacion', 'title_page'));
	}
	public function activar($id) {
		$Habitacion = Habitacion::findOrFail($id);

		$Habitacion->condicion = '1';
		$Habitacion->update();

		return redirect()->route('habeliminadas')->with('datos', '¡Registro activado exitosamente!');
	}

}

<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

//
class ProductController extends Controller {
	public function index(Request $request) {
		if ($request) {

			$title_page = "Habitaciones";
			$title_hab = "Suites";
			$query = trim($request->get('searchText'));
			$habitacion = Product::join('categories as cat', 'products.category_id', '=', 'cat.id')
				->select('products.id', 'products.name', 'products.descripcion', 'products.img', 'products.incluye', 'cat.name_cat as nomCategoria', 'products.price as temprecio')
				->where('products.name', 'LIKE', '%' . $query . '%')
				->where('products.condicion', '=', 1)
			//->get()
				->paginate(8);

			return view('admin.products.index', compact('habitacion', 'title_page', 'title_hab', 'query'));
		}
	}

	public function reservasPendientes(Request $request) {
		if ($request) {
			$title_page = "Reservas pendientes";
			$title_hab = "Lista de Reservas pendientes";
			$query = trim($request->get('searchText'));
			$habitacion = DB::table('cart_details as cd')
				->join('products as pro', 'cd.product_id', '=', 'pro.id')
				->join('carts as car', 'cd.cart_id', '=', 'car.id')
				->join('users as us', 'car.user_id', '=', 'us.id')
				->join('categories as cat', 'pro.category_id', '=', 'cat.id')
				->select('cd.id', 'cd.entry_date', 'cd.departure_date', 'cd.facturar', 'pro.name', 'pro.price as temprecio', 'cat.name_cat as nomCategoria', 'us.username', 'us.email', 'us.phone', 'car.status')
				->where('pro.name', 'LIKE', '%' . $query . '%')
				->where('car.status', '=', "Active")
				->get();
			//->paginate(8);
			dd($habitacion);

			return view('admin.reservas.reservas-pendientes', compact('habitacion', 'query', 'title_page', 'title_hab'));
		}
	}

	public function reservasAprobadas(Request $request) {
		if ($request) {
			$title_page = "Reservas Aprobadas";
			$title_hab = "Lista de Reservas Aprobadas";
			$query = trim($request->get('searchText'));
			$habitacion = DB::table('cart_details as cd')
				->join('products as pro', 'cd.product_id', '=', 'pro.id')
				->join('carts as car', 'cd.cart_id', '=', 'car.id')
				->join('users as us', 'car.user_id', '=', 'us.id')
				->join('categories as cat', 'pro.category_id', '=', 'cat.id')
				->select('cd.id', 'cd.folio_reserva', 'cd.entry_date', 'cd.departure_date', 'cd.facturar', 'pro.name', 'pro.price as temprecio', 'cat.name_cat as nomCategoria', 'us.username', 'us.email', 'us.phone', 'car.status')
				->where('pro.name', 'LIKE', '%' . $query . '%')
				->where('car.status', '=', "Aprobada")
			//->get()
				->paginate(8);
			//dd($habitacion);

			return view('admin.reservas.reservas-aprobadas', compact('habitacion', 'query', 'title_page', 'title_hab'));
		}
	}

	public function inactivo(Request $request) {
		if ($request) {

			$title_page = "Habitaciones";
			$title_hab = "Suites";
			$query = trim($request->get('searchText'));
			$habitacion = Product::join('categories as cat', 'products.category_id', '=', 'cat.id')
				->select('products.id', 'products.name', 'products.descripcion', 'products.img', 'products.incluye', 'cat.name_cat as nomCategoria', 'products.price as temprecio')
				->where('products.name', 'LIKE', '%' . $query . '%')
				->where('products.condicion', '=', 0)
			//->get()
				->paginate(8);

			return view('admin.products.index_inac', compact('habitacion', 'title_page', 'title_hab', 'query'));
		}
	}
	public function activar($id) {
		$Habitacion = Product::findOrFail($id);

		$Habitacion->condicion = '1';
		$Habitacion->update();

		return redirect()->route('products.inactiva')->with('datos', '¡Registro activado exitosamente!');
	}

	public function create() {
		$categories = Category::all();
		$title_page = "Habitaciones";
		$title_hab = "Hab";
		return view('admin.products.create')->with(compact('categories', 'title_page', 'title_hab')); //formulario de registro
	}

	public function store(Request $request) {
		//registrar el nuevo producto en la bd
		//dd($request->all());
		$messages = [
			'name.required' => 'Es necesario ingresar un nombre para la habitacion',
			'name.min' => 'El nombre de la habitacion debe tener al menos 6 caracteres',
			'price.required' => 'Es obligatorio definir un precio para la habitacion',
			'price.numeric' => 'Ingrese u  numero valido',
			'price.min' => 'No se admiten valores negativos',
			'category_id' => 'Necesitas seleccionar una categoria para la Habitacion',
			'img.min_width' => 'Para las imagenes solo se permiten como minimo 100px de ancho',
			'img.min_height' => 'Para las imagenes solo se permiten como minimo 200px de largo',
			'img.max' => 'Para las imagenes solo se permiten como maximo 5000px',
		];
		$rules = [
			'name' => 'required|min:6',
			'price' => 'required|numeric|min:0',
			'category_id' => 'required',
			'img' => 'dimensions:min_width=100,min_height=200|max:5000',
		];

		$this->validate($request, $rules, $messages);
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

		$product = new Product();
		$product->name = $request->input('name');
		$product->price = $request->input('price');
		$product->descripcion = '[' . $datosdescripcion . ']';
		$product->incluye = $json_incluye;
		$product->img = $arrayimg;
		$product->condicion = '1';
		$product->category_id = $request->category_id;
		//dd($product);
		$product->save(); //ejecutar una consulta INSERT a la tabla productos

		return redirect()->route('products');

	}

	public function edit($id) {
		$title_page = "Editar Habitacion";
		$title_hab = "Hab";
		$categories = Category::all();
		$product = Product::find($id);

		return view('admin.products.edit', compact('product', 'categories', 'title_page'));
	}

	public function update(Request $request, $id) {
		$messages = [
			'name.required' => 'Es necesario ingresar un nombre para el producto',
			'name.min' => 'El nombre del producto debe tener al menos 6 caracteres',
			'price.required' => 'Es obligatorio definir un precio para la habitacion',
			'price.numeric' => 'Ingrese u  numero valido',
			'price.min' => 'No se admiten valores negativos',
		];
		$rules = [
			'name' => 'required|min:6',
			'price' => 'required|numeric|min:0',
		];

		$this->validate($request, $rules, $messages);

		$product = Product::find($id);
		$product->name = $request->input('name');
		$product->price = $request->input('price');
		$product->descripcion = '[' . $datosdescripcion . ']';
		$product->incluye = $json_incluye;
		$product->category_id = $request->category_id;
		$product->save(); //ejecutar una consulta UPDATE a la tabla productos

		return redirect()->route('products');
	}

	public function destroy($id) {
		$product = Product::findOrFail($id);

		$product->condicion = '0';
		$product->update();

		return redirect()->route('products')->with('datos', '¡Registro eliminado exitosamente!');
	}

}

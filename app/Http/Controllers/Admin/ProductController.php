<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;

//
class ProductController extends Controller {
	public function index(Request $request) {
		if ($request) {

			$title_page = "Habitaciones";
			$title_hab = "Suites";
			$query = trim($request->get('searchText'));
			//$habitacion = Product::paginate(5);
			/*$habitacion = Product::with('category')->where('condicion', '=', 1)->where('products.name', 'LIKE', '%' . $query . '%')->paginate(5);*/
			$habitacion = Product::join('categories as cat', 'products.category_id', '=', 'cat.id')
				->select('products.id', 'products.name', 'products.descripcion', 'products.img', 'products.incluye', 'cat.name_cat as nomCategoria', 'products.price as temprecio')
				->where('products.name', 'LIKE', '%' . $query . '%')
				->where('products.condicion', '=', 1)
			//->get()
				->paginate(8);

			/*$habitacion = DB::table('products as pro')
				->join('categories as cat', 'pro.category_id', '=', 'cat.id')
				->select('pro.id', 'pro.name', 'pro.descripcion', 'pro.img', 'pro.incluye', 'cat.name_cat as nomCategoria', 'pro.price as temprecio')
				->where('pro.name', 'LIKE', '%' . $query . '%')
				->where('pro.condicion', '=', 1)
				->paginate(10);*/

			return view('admin.products.index', compact('habitacion', 'title_page', 'title_hab', 'query'));
		}
	}

	public function reservasAprobadas() {
		//
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
			//$habitacion = Product::paginate(5);
			//$user_id = Auth::user()->id;
			//$habitacion = Product::with('category')->where('condicion', '=', 0)->paginate(5);
			/*$habitacion = DB::table('products as pro')
				->join('categories as cat', 'pro.category_id', '=', 'cat.id')
				->select('pro.id', 'pro.name', 'pro.descripcion', 'pro.img', 'pro.incluye', 'cat.name_cat as nomCategoria', 'pro.price as temprecio')
				->where('pro.name', 'LIKE', '%' . $query . '%')
				->where('pro.condicion', '=', 0)
				->paginate(10);*/

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
		];
		$rules = [
			'name' => 'required|min:6',
			'price' => 'required|numeric|min:0',
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

		return redirect('/admin/products');
	}

	public function destroy($id) {
		$product = Product::findOrFail($id);

		$product->condicion = '0';
		$product->update();

		return redirect()->route('products')->with('datos', '¡Registro eliminado exitosamente!');
	}

}

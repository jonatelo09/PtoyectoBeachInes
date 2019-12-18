<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller {
	public function index(Request $request) {
		if ($request) {
			$title_page = "Categorias";
			$title_hab = "LIsta de Categorias";
			$query = trim($request->get('searchText'));
			$categories = Category::where('categories.name_cat', 'LIKE', '%' . $query . '%')
				->paginate(6);
			return view('admin.category.index')->with(compact('categories')); //devolvera el listado de los productos
		}
	}

	public function create() {
		return view('admin.category.create'); //formulario de registro
	}

	public function store(Request $request) {
		//registrar el nuevo producto en la bd
		//dd($request->all());
		$messages = [
			'name_cat.required' => 'Es necesario ingresar un nombre para el producto',
			'name_cat.min' => 'El nombre del producto debe tener al menos 6 caracteres',
			'description.required' => 'La description corta es obligatorio',
			'description.max' => 'La descripcion corta admite solo 30 caracteres',
		];
		$rules = [
			'name_cat' => 'required|min:3',
			'description' => 'required|max:100',
		];

		$this->validate($request, $rules, $messages);

		$categori = new Category();
		$categori->name_cat = $request->input('name_cat');
		$categori->description = $request->input('description');
		$categori->save(); //ejecutar una consulta INSERT a la tabla productos
		return redirect('/admin/category');

	}

	public function edit($id) {
		$categori = Category::find($id);
		return view('admin.category.edit')->with(compact('categori'));
	}

	public function update(Request $request, $id) {
		$messages = [
			'name.required' => 'Es necesario ingresar un nombre para la Categoria',
			'name.min' => 'El nombre de la Categoria debe tener al menos 3 caracteres',
			'description.required' => 'La description corta es obligatorio',
			'description.max' => 'La descripcion corta admite solo 30 caracteres',
		];
		$rules = [
			'name_cat' => 'required|min:3',
			'description' => 'required|max:100',
		];

		$this->validate($request, $rules, $messages);

		$categori = Category::find($id);
		$categori->name_cat = $request->input('name_cat');
		$categori->description = $request->input('description');
		$categori->save(); //ejecutar una consulta UPDATE a la tabla productos

		return redirect('/admin/category');
	}

	public function destroy($id) {
		$categori = Category::find($id);
		$categori->delete(); //ejecutar una consulta DELETE a la tabla productos

		return redirect('/admin/category');
	}
}

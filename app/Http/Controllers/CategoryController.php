<?php

namespace App\Http\Controllers;

use App\Category;

class CategoryController extends Controller {
	public function show(Category $category) {
		$products = $category->products()->paginate(6);
		return view('categories.show')->with(compact('category', 'products'));
	}

	public function showdos(Category $category) {
		$products = $category->products()->paginate(6);
		return view('categories.showdos')->with(compact('category', 'products'));
	}

	

}

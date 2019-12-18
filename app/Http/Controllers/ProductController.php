<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller {
	public function show($id) {
		$product = Product::find($id);
		$images = $product->images;

		$imagesLeft = collect();
		$imagesRigth = collect();
		foreach ($images as $key => $image) {
			if ($key % 2 == 0) {
				$imagesLeft->push($image);
			} else {
				$imagesRigth->push($image);
			}

		}
		return view('products.show')->with(compact('product', 'imagesLeft', 'imagesRigth'));
	}

	public function showdos($id) {
		$title_page = "Habitacion";
		$title_hab = "Habitacion";
		$product = Product::find($id);
		$images = $product->images;

		$imagesLeft = collect();
		$imagesRigth = collect();
		foreach ($images as $key => $image) {
			if ($key % 2 == 0) {
				$imagesLeft->push($image);
			} else {
				$imagesRigth->push($image);
			}

		}
		return view('products.showdos')->with(compact('product', 'imagesLeft', 'imagesRigth', 'title_page', 'title_hab'));
	}
	public function reservasAprobadas(Request $request) {
		if ($request) {
			$title_page = "Reservas Aprobadas";
			$title_hab = "Lista de Reservas Aprobadas";
			$user = auth()->user()->id;
			$canti = DB::table('cart_details as cd')
				->join('products as pro', 'cd.product_id', '=', 'pro.id')
				->join('carts as car', 'cd.cart_id', '=', 'car.id')
				->join('users as us', 'car.user_id', 'us.id')
				->join('categories as cat', 'pro.category_id', '=', 'cat.id')
				->where('us.id', '=', $user)
				->count();
			//dd($canti);
			$habitacion = DB::table('cart_details as cd')
				->join('products as pro', 'cd.product_id', '=', 'pro.id')
				->join('carts as car', 'cd.cart_id', '=', 'car.id')
				->join('users as us', 'car.user_id', 'us.id')
				->join('categories as cat', 'pro.category_id', '=', 'cat.id')
				->select('cd.id', 'cd.folio_reserva', 'cd.entry_date', 'cd.departure_date', 'cd.facturar', 'cd.quantity', 'pro.descripcion', 'pro.incluye', 'pro.name', 'pro.price', 'cat.name_cat', 'us.username', 'us.email', 'us.phone', 'car.status')
				->where('us.id', '=', $user)
				->get();
			//->paginate(8);
			//dd($habitacion);

			return view('users.reservas-realizadas', compact('habitacion', 'query', 'title_page', 'title_hab', 'canti'));
		}
	}
}

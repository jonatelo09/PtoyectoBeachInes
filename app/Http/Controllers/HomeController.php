<?php

namespace App\Http\Controllers;

class HomeController extends Controller {
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct() {
		$this->middleware('auth');
	}

	/**
	 * Show the application dashboard.
	 *
	 * @return \Illuminate\Contracts\Support\Renderable
	 */
	public function index() {
		/*$reservas = DB::table('cart_details as ct')
				->join('products as pro', 'ct.product_id', '=', 'pro.id')
				->join('carts as car', 'ct.cart_id', '=', 'car.id')
				->join('users as us', 'car.user_id', '=', 'us.id')
				->join('categories as cat', 'pro.category_id', '=', 'cat.id')
				->join('product_images as pimage', 'pro.id', '=', 'pimage.id')
				->select('ct.id', 'ct.entry_date', 'ct.quantity', 'ct.departure_date', 'pro.name', 'pro.descripcion', 'pimage.image', 'pro.incluye', 'car.status', 'cat.name_cat', 'us.username', 'us.address')
				->get();
			//dd($reservas);
		*/
		if (auth()->user()->admin) {
			// return view('plantilla_admin.plantilla_admin');
			return redirect()->route('products');

		} else {
			// return view('plantilla_huesped.plantilla_huesped');
			return redirect()->route('inicio');
		}
	}
}

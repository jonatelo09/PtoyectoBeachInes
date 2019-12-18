<?php

namespace App\Http\Controllers;
use App\CartDetail;
use Carbon\Carbon;

class GeneradorController extends Controller {
	public function imprimir($id) {
		$details_id = CartDetail::join('products as pro', 'cart_details.product_id', '=', 'pro.id')
			->join('categories as cat', 'pro.category_id', '=', 'cat.id')
			->join('carts as car', 'cart_details.cart_id', '=', 'car.id')
			->join('users as us', 'car.user_id', '=', 'us.id')
			->select('cart_details.id', 'cart_details.folio_reserva', 'cart_details.quantity', 'pro.name', 'pro.price', 'cat.name_cat', 'us.username', 'us.firstname', 'us.lastname', 'us.email', 'pro.descripcion', 'us.phone', 'car.status')
			->find($id);
		$day = Carbon::now()->format('d');
		$month = Carbon::now()->format('m');
		$year = Carbon::now()->format('y');
		$pdf = \PDF::loadView('admin.imprimir.plan', compact('details_id', 'day', 'month', 'year'));
		return $pdf->download('Reserva' . '-' . $details_id->folio_reserva . '.pdf');
	}
}

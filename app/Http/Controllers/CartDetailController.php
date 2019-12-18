<?php

namespace App\Http\Controllers;

use App\CartDetail;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartDetailController extends Controller {
	public function __construct() {
		$this->middleware('auth');
	}
	public function index() {
		$reservas = DB::table('cart_details as ct')
			->join('products as pro', 'ct.product_id', '=', 'pro.id')
			->join('carts as car', 'ct.cart_id', '=', 'car.id')
			->join('users as us', 'car.user_id', '=', 'us.id')
			->join('categories as cat', 'pro.category_id', '=', 'cat.id')
			->select('ct.id', 'pro.name', 'ct.entry_date', 'ct.quantity', 'ct.departure_date', 'pro.descripcion', 'pro.incluye', 'car.status', 'cat.name_cat', 'us.username', 'us.address', 'ct.folio_reserva', 'ct.facturar')
			->where('car.status', '=', 'Active')
			->get();
		//dd($reservas);
		$title_page = "Habitaciones";
		$title_hab = "Reservas";
		return view('home', compact('title_page', 'title_hab', 'reservas'));
	}
	public function store(Request $request) {
		$cartDetail = new CartDetail();
		$date_inicio = $request->entry_date;
		$inicio = Carbon::parse($date_inicio);
		$date_final = $request->departure_date;
		$final = Carbon::parse($date_final);
		$diasDiferencia = $inicio->diffInDays($final);
		$cartDetail->cart_id = auth()->user()->cart->id;
		$cartDetail->product_id = $request->product_id;
		$cartDetail->entry_date = $request->entry_date;
		$cartDetail->quantity = $diasDiferencia;
		$cartDetail->departure_date = $request->departure_date;
		$cartDetail->facturar = $request->input('facturar');
		$cartDetail->folio_reserva = $request->input('folio');
		//dd($cartDetail);
		$cartDetail->save();

		return redirect()->route('reservas')->with('info', 'El producto se a cargado exitosamente a tu carrito de compras');
	}

	public function destroy($id) {

		$cartDetail = CartDetail::find($id);

		if ($cartDetail->cart_id == auth()->user()->cart->id) ///validad si el id del carrito de compras es del usuario que se logeo
		{
			$cartDetail->delete();
		}

		$notification = 'El producto se a eliminado del carrito correctamente';
		return back()->with(compact('notification'));
	}

	public function compararfecha(Request $request) {
		$title_page = "Reservaciones";
		$query = $request->get('id');
		$habitacion = DB::table('products as pro')
			->join('categories as cat', 'pro.category_id', '=', 'cat.id')
			->select('pro.id', 'pro.name', 'pro.descripcion', 'pro.price as temprecio', 'pro.img', 'pro.incluye', 'cat.name_cat as nomCategoria')
			->where('pro.id', '=', $query)
			->get();

		if (!empty($request->entry_date) && !empty($request->departure_date)) {
			$date_inicio = $request->entry_date;
			$inicio = Carbon::parse($date_inicio);
			$date_final = $request->departure_date;
			$final = Carbon::parse($date_final);
			$diasDiferencia = $inicio->diffInDays($final);

			$disponibilidad = DB::table('cart_details as cd')
				->join('products as pro', 'cd.product_id', '=', 'pro.id')
				->join('categories as cat', 'pro.category_id', '=', 'cat.id')
				->select('cd.id', 'cd.folio_reserva', 'cd.entry_date', 'cd.departure_date', 'cd.quantity', 'pro.price as temprecio', 'pro.name as nomhabitacion')
				->where('cd.departure_date', '>=', $request->entry_date)
				->where('cd.entry_date', '<=', $request->departure_date)
				->orWhere('cd.departure_date', '>', $request->departure_date)
				->where('cd.entry_date', '<', $request->departure_date)
				->orWhere('cd.entry_date', '<', $request->entry_date)
				->where('cd.departure_date', '<', $request->departure_date)
				->where('cd.departure_date', '>', $request->entry_date)
				->where('cd.id', '=', 8)
				->where('pro.category_id', '=', 'cat.id')
				->count();
			return view('reservas.reservar', compact('habitacion', 'disponibilidad', 'diasDiferencia', 'disponibilidad', 'title_page', 'date_inicio', 'date_final'));
		}
		return view('reservas.reservar', compact('habitacion', 'title_page'));
	}
}

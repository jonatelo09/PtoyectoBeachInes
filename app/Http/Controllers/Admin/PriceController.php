<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Price;
use Illuminate\Http\Request;

class PriceController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		$prices = Price::paginate(7);
		return view('admin.prices.index', compact('prices'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		return view('admin.prices.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {
		$prices = Price::create($request->all());
		return redirect()->route('prices');
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Price  $price
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Price $price) {
		return view('admin.prices.edit', compact('price'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\Price  $price
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, Price $price) {
		$price->update($request->all());
		return redirect()->route('prices.index', $price->id)
			->with('info', 'Categoria actualizado con Éxito!');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Price  $price
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Price $price) {
		$price->delete();
		return back()->with('info', 'Eliminado correctamente');
	}
}

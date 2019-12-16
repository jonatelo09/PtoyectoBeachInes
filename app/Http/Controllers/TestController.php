<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;

class TestController extends Controller {
	public function welcome() {
		$title_page = "Bienvenidos";
		return view('paginas.inicio', compact('title_page'));
	}

	public function principal() {

		return view('layouts.principal');
	}

	public function welcomedos() {

		$categories = Category::has('products')->get();

		//$productos = Product::where('featured', true)->load('category', 'images');//

		/*$products DB::table('products')
						            ->join('product_images', 'product_images.id', '=', 'products.id')
						            ->select('products.nombre', 'products.description','products.price', 'product_images.featured', 'product_images.image')
			                        ->get();
		*/
		/*$products = Product::all()->load([
			'product_images' => function ($q) {
				$q->where('featured', true);
			},
		]);*/

		$products = Product::leftJoin('product_images', 'product_images.id', '=', 'products.id')
			->where('product_images.featured', true)->get();

		return view('welcomedos')->with(compact('categories', 'products'));
	}
}

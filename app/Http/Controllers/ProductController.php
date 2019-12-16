<?php

namespace App\Http\Controllers;

use App\Product;

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
}

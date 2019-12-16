<?php

namespace App;

use App\Product;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model {
	public function details() {
		return $this->hasMany(CartDetail::class);

	}
	public function getTotalAttribute() {
		$total = 0;
		foreach ($this->details as $detail) {
			$total += $detail->quantity * $detail->product->price;
		}

		return $total;
	}

	public function getQuantityAttribute() {
		$suma = 0;
		foreach ($$this->details as $detalle) {
			$suma *= $detalle->quantity;
		}
		return $suma;
	}
}

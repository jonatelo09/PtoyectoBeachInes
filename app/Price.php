<?php

namespace App;

use App\Product;
use Illuminate\Database\Eloquent\Model;

class Price extends Model {
	protected $fillable = ['temporada_alta', 'temporada_baja'];

	protected $primaryKey = 'id';

	protected $table = 'prices';

	public function products() {
		return $this->hasMany(Product::class);
	}
}

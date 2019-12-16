<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model {
	protected $primaryKey = 'id';
	protected $table = 'products';
	// $product->category
	public function category() {
		return $this->belongsTo(Category::class);
	}

	public function price() {
		return $this->belongsTo(Price::class);
	}

	//$product ->images

	public function images() {
		return $this->hasMany(ProductImage::class);
	}

	public function comentary() {
		return $this->hasMany(Comentary::class);
	}

	public function score() {
		return $this->hasMany(Score::class);
	}

	public function getFeaturedImageUrlAttribute() {
		$featuredImage = $this->images()->where('featured', true)->first();
		if (!$featuredImage) {
			$featuredImage = $this->images()->first();
		}

		if ($featuredImage) {
			return $featuredImage->url;
		}

		//default
		return '/images/products/product-default.jpg';
	}

	public function getCategoryNameAttribute() {
		if ($this->category) {
			return $this->category->name;
		}

		return 'Genreal';
	}
}
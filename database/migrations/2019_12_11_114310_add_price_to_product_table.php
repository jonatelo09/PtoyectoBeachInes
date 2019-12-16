<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPriceToProductTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::table('products', function (Blueprint $table) {
			//FK
			/*$table->unsignedBigInteger('id_price')->nullable();
			$table->foreign('id_price', 'fk_products_prices')->references('id')->on('prices')->onDelete('restrict')->onUpdate('restrict');*/
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::table('products', function (Blueprint $table) {
			//
		});
	}
}

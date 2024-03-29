1<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('products', function (Blueprint $table) {
			$table->increments('id');
			$table->string('name');
			$table->float('price');
			$table->string('descripcion', 1000);
			$table->string('incluye', 1500);
			$table->string('img', 1500)->nullable();
			$table->string('condicion', 1)->nullable();

			//FK
			$table->integer('category_id')->unsigned()->nullable();
			$table->foreign('category_id')->references('id')->on('categories');

			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('products');
	}
}

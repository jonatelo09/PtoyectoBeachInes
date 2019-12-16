<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartsTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('carts', function (Blueprint $table) {
			$table->increments('id');
			$table->date('oreder_date')->nullable();
			$table->date('arrived_date')->nullable();
			$table->string('status'); // active, pending, aproved, cancelled, finished

			// user_id (FK) customer
			$table->integer('user_id')->unsigned();
			$table->foreign('user_id')->references('id')->on('users');

			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('carts');
	}
}

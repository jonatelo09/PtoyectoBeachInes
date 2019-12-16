<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('users', function (Blueprint $table) {
			$table->increments('id');
			$table->string('username');
			$table->string('firstname');
			$table->string('lastname');
			$table->string('email')->unique();
			$table->string('phone')->unique()->nullable();
			$table->string('sex');
			$table->string('address');
			$table->timestamp('email_verified_at')->nullable();
			$table->string('password');
			$table->boolean('admin')->default(false);
			$table->rememberToken();
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('users');
	}
}

<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder {
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {
		User::create([
			'username' => 'Jonatelo09',
			'firstname' => 'Jonatan',
			'lastname' => 'Arevalo',
			'sex' => 'Masculino',
			'email' => 'kuroko.arevalo@gmail.com',
			'phone' => '9983456795',
			'address' => 'Region 96, MZ 5 LTE 17, CALLE 12, CANCUN, QUINTANA ROO',
			'password' => bcrypt('Jonatelo_568923'),
			'admin' => true,
		]);

		User::create([
			'username' => 'ines98',
			'firstname' => 'Ines',
			'lastname' => 'Alvarez',
			'sex' => 'Femenino',
			'email' => 'inesbeachhotel@gmail.com',
			'phone' => '9981373875',
			'address' => 'Region 96, MZ 5 LTE 17, CALLE 12, CANCUN, QUINTANA ROO',
			'password' => bcrypt('HotelBeach_568923'),
			'admin' => true,
		]);

	}
}

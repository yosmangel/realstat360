<?php

use Illuminate\Database\Seeder;

class UsuariosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@mail.com',
            'password' => bcrypt('pc1234'),
            'verified' => true,
            'user_type'  => 25,
            'remember_token' => generateToken(),
            'api_token' => generateToken()
            ]);
        DB::table('users')->insert([
        	'name' => 'propietario',
	        'email' => 'propietario@mail.com',
	        'password' => bcrypt('pc1234'),
            'verified' => true,
            'user_type'  => 0,
	        'remember_token' => generateToken(),
            'api_token' => generateToken()
        	]);
        DB::table('users')->insert([
        	'name' => 'demanda',
	        'email' => 'demanda@mail.com',
	        'password' => bcrypt('pc1234'),
            'verified' => true,
            'user_type'  => 2,
	        'remember_token' => generateToken(),
            'api_token' => generateToken()
        	]);
        DB::table('users')->insert([
        	'name' => 'profesional',
	        'email' => 'profesional@mail.com',
	        'password' => bcrypt('pc1234'),
            'verified' => true,
            'user_type'  => 1,
	        'remember_token' => generateToken(),
            'api_token' => generateToken()
        	]);
    }
}

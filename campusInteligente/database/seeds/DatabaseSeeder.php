<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('users')->insert([
          'name' => str_random(10),
          'email' => str_random(10).'@gmail.com',
          'cpf' => str_random(10),
          'type' => 0,
          'telefone' => str_random(8),
          'password' => bcrypt('secret'),
      ]);
    }
}

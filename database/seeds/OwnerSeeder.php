<?php

use Illuminate\Database\Seeder;

class OwnerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       factory(App\User::class)->create([
           'name' => 'David Kovalski',
           'email' => 'dudu@gmail.com',
           'password' => Hash::make('123456'),
           'remember_token' => str_random(30),
           'role' => 'Owner',
           'phone' => '0549564250',
           'img' => 'Owner.jpeg',
        ]);
    }
}

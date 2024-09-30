<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        User::create([
        	'name' => 'Super Account',
        	'email' => 'super@upi.ac.id',
        	'password' => Hash::make('super'),
        	'id_role' => 1
        ]);

        User::create([
        	'name' => 'Admin Account',
        	'email' => 'admin@upi.ac.id',
        	'password' => Hash::make('admin'),
        	'id_role' => 2
        ]);

    }
}

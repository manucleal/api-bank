<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

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
        try {
            
            Schema::disableForeignKeyConstraints();
            User::truncate();
            
            $users = array(
                ['name'=>'Emanuel', 'email' => 'emanuel@labs.com', 'password' => Hash::make('hola12') ],
                ['name'=>'Fernanda', 'email' => 'fernanda@labs.com','password' => Hash::make('hola123') ],
                ['name'=>'Belén', 'email' => 'belen@labs.com', 'password' => Hash::make('hola1234') ]
            );

            foreach($users as $user) {
                User::create($user);
            }
            
        } catch ( \Illuminate\Database\QueryException $e) {
            var_dump($e->errorInfo);
        }
    }
}

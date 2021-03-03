<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Seeder;
use App\Models\Currency;

class CurrencySeeder extends Seeder
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
            Currency::truncate();
            
            $currencies = array(
                ['type' => 'USD', 'description' => 'Estos son Dólares americanos' ],
                ['type' => 'UYU', 'description' => 'Estos son Pesos uruguayos' ],
                ['type' => 'EUR', 'description' => 'Estos son Euros' ]
            );

            foreach($currencies as $user) {
                Currency::create($user);
            }
            
        } catch ( \Illuminate\Database\QueryException $e) {
            var_dump($e->errorInfo);
        }
    }
}

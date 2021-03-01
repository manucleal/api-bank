<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Seeder;
use App\Models\Models\Currency;

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
                ['type' => 'american_dollars', 'description' => 'Estos son Dólares americanos' ],
                ['type' => 'ury_pesos', 'description' => 'Estos son Pesos uruguayos' ],
                ['type' => 'euros', 'description' => 'Estos son Euros' ]
            );

            foreach($currencies as $user) {
                Currency::create($user);
            }
            
        } catch ( \Illuminate\Database\QueryException $e) {
            var_dump($e->errorInfo);
        }
    }
}

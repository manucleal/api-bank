<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Seeder;
use App\Models\Account;

class AccountSeeder extends Seeder
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
            Account::truncate();

            $accounts = array(
                ['user_id' => 1, 'currency_id' => 1, 'balance' => 1200 ],
                ['user_id' => 1, 'currency_id' => 2, 'balance' => 10000 ],
                ['user_id' => 2, 'currency_id' => 2,'balance' => 700 ],
                ['user_id' => 3, 'currency_id' => 2,'balance' => 400 ]
            );

            foreach($accounts as $account) {
                Account::create($account);
            }
            
        } catch ( \Illuminate\Database\QueryException $e) {
            var_dump($e->errorInfo);
        }        
    }
}

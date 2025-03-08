<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        DB::table('distributors')->insert([
            ['name' => 'Distributor A1', 'district' => 'Alipurduar'],
            ['name' => 'Distributor A2', 'district' => 'Alipurduar'],
            ['name' => 'Distributor B1', 'district' => 'Bankura'],
            ['name' => 'Distributor B2', 'district' => 'Bankura'],
            ['name' => 'Distributor C1', 'district' => 'Birbhum'],
            ['name' => 'Distributor C2', 'district' => 'Birbhum'],
        ]);
    }
}

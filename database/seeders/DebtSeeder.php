<?php

namespace Database\Seeders;

use App\Models\Debt;
use Illuminate\Database\Seeder;

class DebtSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Debt::factory(100)->create();
    }
}

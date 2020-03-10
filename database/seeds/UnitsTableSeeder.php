<?php

use Illuminate\Database\Seeder;
use App\Unit;

class UnitsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Unit::create([
            'unit_name' => 'IT'
        ]);
        Unit::create([
            'unit_name' => 'Umum'
        ]);
    }
}

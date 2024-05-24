<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PartnersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('partners')->insert([
            ['Partner_Name' => 'Hinojosa'],
            ['Partner_Name' => 'Klingele'],
            ['Partner_Name' => 'VPK'],
            ['Partner_Name' => 'Cart-One FEPA'],
            ['Partner_Name' => 'Cart-One SADA'],
        ]);
    }
}

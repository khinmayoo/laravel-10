<?php

namespace Database\Seeders;

use App\Models\Country;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $data = [
            'Myanmar',
            'China',
            'Singapore',
            'Thai'
        ];

        // DB::table('countries')->insert($data);

        foreach($data as $value)
        {
            Country::create([
                'name' => $value
             ]);
        }

    }
}

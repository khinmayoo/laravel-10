<?php

namespace Database\Seeders;

use App\Models\Township;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TownshipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'name' => 'Hlaing Township',
                'state_id' =>  1,
            ],[
                'name' => 'SanChaung Township',
                'state_id' => 1
            ],
            [
                'name' => 'Kamayut_Township',
                'state_id' => 1
            ],
            [
                'name' => 'Aung May TharSi',
                'state_id' => 2
            ],
            [
                'name' => 'MongYwa',
                'state_id' => 3
            ],
            [
                'name' => 'Kalay',
                'state_id' => 3
            ],
            [
                'name' => 'Hakha',
                'state_id' => 4
            ]
        ];

        foreach($data as $value)
        {
            Township::create([
                'name' => $value['name'],
                'state_id' => $value['state_id']
            ]);
        }
    }
}

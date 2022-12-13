<?php

namespace Database\Seeders;
//use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Partner;

class PartnersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'logo' => 'partner1.svg',
                'name' => 'Партнер #1'
            ],
            [
                'logo' => 'partner1.svg',
                'name' => 'Партнер #2'
            ],
            [
                'logo' => 'partner1.svg',
                'name' => 'Партнер #3'
            ],
            [
                'logo' => 'partner1.svg',
                'name' => 'Партнер #4'
            ],
            [
                'logo' => 'partner1.svg',
                'name' => 'Партнер #5'
            ],
            [
                'logo' => 'partner1.svg',
                'name' => 'Партнер #6'
            ],
            [
                'logo' => 'partner1.svg',
                'name' => 'Партнер #7'
            ],
            [
                'logo' => 'partner1.svg',
                'name' => 'Партнер #8'
            ],
        ];

        foreach($data as $item) {
            Partner::create($item);
        }
    }
}

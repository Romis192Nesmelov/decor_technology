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
                'logo' => 'arscom.png',
                'name' => 'Агентство<br>полного цикла'
            ],
            [
                'logo' => 'eventum_premo.svg',
                'name' => 'Digital<br>и event-агентство'
            ],
            [
                'logo' => 'karandash.svg',
                'name' => 'Коммуникационное<br>ивент агентство'
            ],
            [
                'logo' => 'cooper_moscow.svg',
                'name' => 'Digital<br>и event-агентство'
            ],
            [
                'logo' => 'action.svg',
                'name' => 'Маркетинговое<br>агентство'
            ],
            [
                'logo' => 'redday.svg',
                'name' => 'Российское<br>ивент агентство'
            ],
            [
                'logo' => 'avantage.jpg',
                'name' => 'Агентство<br>бутикового типа'
            ],
            [
                'logo' => 'best_practice.svg',
                'name' => 'Агентство<br>бутикового типа'
            ],
        ];

        foreach($data as $item) {
            Partner::create($item);
        }
    }
}

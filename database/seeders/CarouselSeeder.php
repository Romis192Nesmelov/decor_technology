<?php

namespace Database\Seeders;
//use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Carousel;

class CarouselSeeder extends Seeder
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
                'head' => 'Презентация VIVO V7 / V7+',
                'text' => 'Оформление презентации нового смартфона VIVO V7 / V7+ в Конгресс-Парке.',
                'image' => 'image1.jpg'
            ],
            [
                'head' => 'Конференция «Алкон» в CRYSTAL BALLROOM',
                'text' => 'Оформление конференции для компании «Алкон» в CRYSTAL BALLROOM.',
                'image' => 'image2.jpg'
            ],
            [
                'head' => 'Конференция в центре Toyota Moscow',
                'text' => 'Оформление конференции для компании «Toyota» в дилерском центре Toyota Moscow.',
                'image' => 'image3.jpg'
            ],
            [
                'head' => 'Конференция «Servier» в «СКОЛКОВО»',
                'text' => 'Оформление конференции для компании «Servier» в учебном центре «СКОЛКОВО».',
                'image' => 'image4.jpg'
            ],
        ];

        foreach($data as $item) {
            Carousel::create($item);
        }
    }
}

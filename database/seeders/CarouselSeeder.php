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
                'head' => 'Lorem ipsum dolor sit amet, consectetur.',
                'text' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto deleniti similique, nesciunt.',
                'image' => 'image1.jpg'
            ],
            [
                'head' => 'Lorem ipsum dolor sit amet, consectetur.',
                'text' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto deleniti similique, nesciunt.',
                'image' => 'image2.jpg'
            ],
            [
                'head' => 'Lorem ipsum dolor sit amet, consectetur.',
                'text' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto deleniti similique, nesciunt.',
                'image' => 'image3.jpg'
            ],
            [
                'head' => 'Lorem ipsum dolor sit amet, consectetur.',
                'text' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto deleniti similique, nesciunt.',
                'image' => 'image4.jpg'
            ],
        ];

        foreach($data as $item) {
            Carousel::create($item);
        }
    }
}

<?php

namespace Database\Seeders;
//use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Icon;

class IconsSeeder extends Seeder
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
                'icon' => 'icon1.svg',
                'head' => 'У нас большой опыт',
                'text' => 'МЫ более 10 лет занимаемся производством и монтажом декораций.',
            ],
            [
                'icon' => 'icon2.svg',
                'head' => 'Мы надежные исполнители',
                'text' => 'НАМ доверяют самых важных клиентов, самые сложные и трудоемкие проекты.',
            ],
            [
                'icon' => 'icon3.svg',
                'head' => 'Мы давно работаем на рынке',
                'text' => 'МЫ работаем на самых известных площадках и выставочных центрах Москвы.',
            ],
            [
                'icon' => 'icon4.svg',
                'head' => 'Мы умеем делать свое дело',
                'text' => 'У НАС собственное производство, надежные поставщики и лучшие комплектующие.',
            ],
            [
                'icon' => 'icon5.svg',
                'head' => 'Мы никогда не подводим',
                'text' => 'У НАС работают высококвалифицированные специалисты и опытные монтажники.',
            ],
            [
                'icon' => 'icon6.svg',
                'head' => 'Creative Stairs',
                'text' => 'МЫ работаем с самыми различными материалами и технологиями производства.',
            ],
            [
                'icon' => 'icon7.svg',
                'head' => 'Creative Stairs',
                'text' => 'МЫ работаем в самых разных сферах декорационного оформления.',
            ],
            [
                'icon' => 'icon8.svg',
                'head' => 'Creative Stairs',
                'text' => 'У НАС привлекательная система скидок и оплат и гибкая ценовая политика.',
            ],
            [
                'icon' => 'icon9.svg',
                'head' => 'Creative Stairs',
                'text' => 'Lorem ipsum dolor sit ame adipisicing elit. Perspiciatis incidunt.',
            ],
        ];

        foreach($data as $item) {
            Icon::create($item);
        }
    }
}

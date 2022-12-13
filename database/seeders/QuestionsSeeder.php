<?php

namespace Database\Seeders;
//use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Question;

class QuestionsSeeder extends Seeder
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
                'question' => 'Как сделать заказ?',
                'answer' => 'Pellentesque massa mi, cursus ac pellentesque a, laoreet bibendum velit. Cras felis augue, scelerisque vitae lobortis vel, pellentesque sed orci.'
            ],
            [
                'question' => 'Нужны ли чертежи и тех.документация?',
                'answer' => 'Pellentesque massa mi, cursus ac pellentesque a, laoreet bibendum velit. Cras felis augue, scelerisque vitae lobortis vel, pellentesque sed orci.'
            ],
            [
                'question' => 'Делаете ли вы дизайн-проекты?',
                'answer' => 'Pellentesque massa mi, cursus ac pellentesque a, laoreet bibendum velit. Cras felis augue, scelerisque vitae lobortis vel, pellentesque sed orci.'
            ],
            [
                'question' => 'Возможна ли застройка (транспортировка) в другом городе или регионе?',
                'answer' => 'Pellentesque massa mi, cursus ac pellentesque a, laoreet bibendum velit. Cras felis augue, scelerisque vitae lobortis vel, pellentesque sed orci.'
            ],
            [
                'question' => 'Какие сроки на застройку?',
                'answer' => 'Pellentesque massa mi, cursus ac pellentesque a, laoreet bibendum velit. Cras felis augue, scelerisque vitae lobortis vel, pellentesque sed orci.'
            ],
            [
                'question' => 'Даете ли вы гарантию или страховку?',
                'answer' => 'Pellentesque massa mi, cursus ac pellentesque a, laoreet bibendum velit. Cras felis augue, scelerisque vitae lobortis vel, pellentesque sed orci.'
            ],
        ];

        foreach($data as $item) {
            Question::create($item);
        }
    }
}

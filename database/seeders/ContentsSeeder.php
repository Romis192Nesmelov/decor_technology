<?php

namespace Database\Seeders;
//use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Content;

class ContentsSeeder extends Seeder
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
                'text' => '<p>Уже %since% наша компания <b>Dekor Technology</b> занимается производством и оформлением декораций для различных мероприятий. За это время мы смогли наладить собственное производство и собрать команду высококвалифицированных специалистов, которые готовы выполнить ваш заказ любой сложности.</p><p>Такие агентства, как <b>Еventum Рremo</b>, <b>Karandash</b>, <b>Аction</b> и многие другие доверяют оформление своих мероприятий именно нам. Компания <b>Dekor Technology</b> готова выполнить ваш заказ с использованием любых материалов в любой сфере декорационного оформления, а наши цены и скидки приятно Вас удивят.</p><p class="mt-5"><span class="d-block font-weight-bold text-black"><b>Алексей Сухин</b></span><span class="d-block font-weight-bold text-muted">Генеральный директор</span></p>',
            ],
        ];

        foreach($data as $item) {
            Content::create($item);
        }
    }
}

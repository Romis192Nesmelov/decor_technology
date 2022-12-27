<?php

namespace Database\Seeders;
//use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\News;

class NewsSeeder extends Seeder
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
                'time' => time(),
                'image' => 'news3.jpg',
                'head' => 'Iusto quos veniam magni totam ultrices 1',
                'text' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec sapien mi, pretium nec tristique eget, tristique sed purus. Mauris finibus nibh non quam porttitor mattis. Sed blandit augue non cursus tincidunt. Aliquam erat volutpat. Nullam fermentum, enim quis viverra laoreet, sem eros interdum metus, sed blandit orci purus vitae ligula. Aenean at augue est. Nulla rutrum leo risus, pretium faucibus velit vestibulum ac. Donec ut vehicula nunc. Nunc id ultricies lectus. Interdum et malesuada fames ac ante ipsum primis in faucibus. Cras euismod iaculis dolor. Phasellus a vehicula nulla. Suspendisse at lorem libero. Donec tincidunt, felis nec laoreet ornare, sem tortor rhoncus nibh, non dignissim est magna eu eros. Phasellus dapibus, urna egestas hendrerit commodo, nisl lectus consequat nisl, a consectetur nulla metus vel risus. Vivamus interdum libero magna, in sollicitudin mauris tristique porttitor.</p>'
            ],
            [
                'time' => time(),
                'image' => 'news2.jpg',
                'head' => 'Iusto quos veniam magni totam ultrices 2',
                'text' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris non nisl ultrices, condimentum mi nec, pellentesque turpis. Donec aliquam dui vel metus tempor pulvinar. Nulla a odio nec nisl malesuada venenatis nec vel dui. Donec finibus, dolor ac commodo iaculis, ex elit tristique turpis, id consectetur metus tellus non diam. Duis a congue diam. Nam at iaculis quam. Aliquam scelerisque mi vel leo gravida, in tristique nibh dictum. Curabitur vitae augue ullamcorper, placerat nibh sed, molestie arcu. Maecenas libero sapien, volutpat et justo ut, sollicitudin placerat ante. Morbi facilisis, metus vel fermentum aliquet, turpis neque hendrerit lacus, id vehicula nibh lacus id lorem. Duis volutpat in tortor et lacinia. Donec ipsum lacus, varius sit amet elementum ut, cursus vitae orci. Vivamus commodo orci a velit pellentesque, at condimentum elit molestie. Nam mauris quam, varius porta rhoncus a, congue a dui. Praesent quis ipsum nibh. Sed mi ante, malesuada eget malesuada non, scelerisque ac ex.</p>'
            ],
            [
                'time' => strtotime('02 December 2002'),
                'image' => 'news1.jpg',
                'head' => 'Новогодняя ярмарка в ТЦ «Метрополис»',
                'text' => '<p>В декабре как правило у всех много проектов, но только один бывает по истине выдающимся, так для нашей компании это стал проект по декорационному оформлению новогодней ярмарки в ТЦ «МЕТРОПОЛИС». За две недели непрерывной работы мы подготовили все декорационное оформление, а также 9 торговых точек на площади в 216 квадратных метров. Десятки сварных конструкций, сотни квадратных метров пластика и столько же самоклеющееся пленники с печатью наивысшего качества, сотни метров световых гирлянд и гибкого неона, ну и конечно десятки «золотых» рук наших сотрудников – вот и все что потребовалось, чтобы реализовать этот проект!!!</p>'
            ],
        ];

        foreach($data as $item) {
            News::create($item);
        }
    }
}

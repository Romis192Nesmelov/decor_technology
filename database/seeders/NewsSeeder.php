<?php

namespace Database\Seeders;
//use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\News;
use Illuminate\Support\Str;

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
                'image' => 'news1_preview.jpg',
                'head' => 'Iusto quos veniam magni totam 1',
                'text' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur tristique mollis mi vitae mollis. Donec ornare massa vulputate lectus dictum dapibus. Pellentesque at malesuada nulla. Proin accumsan aliquam ornare. Pellentesque ullamcorper velit nec lobortis placerat. Sed ornare elementum lacus eu condimentum. In sit amet turpis vel urna egestas egestas at eget enim. Aliquam et tellus quis sem dignissim commodo. Quisque lacinia dictum tortor, in malesuada tellus aliquam nec. Vestibulum sed euismod dolor. Aenean facilisis lobortis nulla, quis vestibulum dui dapibus in. Morbi malesuada tristique ante ut vehicula.</p><p>Pellentesque massa mi, cursus ac pellentesque a, laoreet bibendum velit. Cras felis augue, scelerisque vitae lobortis vel, pellentesque sed orci. Vivamus massa tellus, consequat quis imperdiet vel, tristique id libero. Praesent aliquam quam ut felis tincidunt, a ullamcorper nisl egestas. Etiam vitae suscipit tellus. In eleifend dictum malesuada. Mauris interdum et mauris ac iaculis. Nullam imperdiet eros urna, eu condimentum lorem egestas id. Pellentesque vel odio in orci auctor accumsan.</p>'
            ],
            [
                'time' => time(),
                'image' => 'news2_preview.jpg',
                'head' => 'Iusto quos veniam magni totam 2',
                'text' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut sed quam pharetra tortor feugiat fringilla eu at nisl. Nunc lobortis ultrices enim et pharetra. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus cursus nibh eu vestibulum pharetra. Proin ornare augue id elit scelerisque euismod. Nunc tempus, massa at aliquam faucibus, neque est pellentesque ex, sit amet facilisis sem erat eu arcu. Aliquam eget tellus commodo, porta tellus sed, dapibus velit. Nullam euismod dui quis nibh cursus dignissim eu eget felis. Cras sed diam a massa dictum dignissim vitae ornare ante. Donec vitae vestibulum augue, et cursus quam. Vivamus eleifend mi at lorem egestas, sed fringilla magna posuere. Proin convallis, erat nec dignissim volutpat, nunc ante porttitor nisl, ac volutpat leo justo in ipsum. Maecenas et velit mollis, vulputate nulla ac, tincidunt lacus.</p><p>Aenean pulvinar nisl in tristique blandit. Aliquam pretium, nisl quis elementum interdum, tellus turpis condimentum arcu, eu accumsan neque tellus eu nisi. Morbi id nisi nec ipsum semper viverra. Pellentesque porta sapien magna, vitae placerat tellus blandit et. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Ut scelerisque dui ac scelerisque vehicula. Ut vel quam sed arcu euismod bibendum. Nunc congue laoreet mauris, et tempus ligula condimentum vel.</p>'
            ],
            [
                'time' => time(),
                'image' => 'news3_preview.jpg',
                'head' => 'Iusto quos veniam magni totam 3',
                'text' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec sapien mi, pretium nec tristique eget, tristique sed purus. Mauris finibus nibh non quam porttitor mattis. Sed blandit augue non cursus tincidunt. Aliquam erat volutpat. Nullam fermentum, enim quis viverra laoreet, sem eros interdum metus, sed blandit orci purus vitae ligula. Aenean at augue est. Nulla rutrum leo risus, pretium faucibus velit vestibulum ac. Donec ut vehicula nunc. Nunc id ultricies lectus. Interdum et malesuada fames ac ante ipsum primis in faucibus. Cras euismod iaculis dolor. Phasellus a vehicula nulla. Suspendisse at lorem libero. Donec tincidunt, felis nec laoreet ornare, sem tortor rhoncus nibh, non dignissim est magna eu eros. Phasellus dapibus, urna egestas hendrerit commodo, nisl lectus consequat nisl, a consectetur nulla metus vel risus. Vivamus interdum libero magna, in sollicitudin mauris tristique porttitor.</p><p>Nulla ac nisl lorem. Praesent hendrerit, nibh sit amet eleifend ultrices, lectus orci pulvinar ipsum, in viverra metus ipsum vel erat. Proin consectetur est ullamcorper massa aliquet rutrum. Cras imperdiet lorem at turpis lacinia posuere. Vivamus eget dignissim felis. Nulla venenatis sed purus mattis congue. Pellentesque vestibulum tortor lacinia luctus elementum. Aenean imperdiet augue nisl, condimentum ullamcorper metus ultricies vitae. Donec ut euismod tellus. Sed rutrum ex vitae convallis accumsan. Nullam fringilla ac velit vitae ornare. Sed sagittis fermentum odio vitae lacinia. Fusce tellus nibh, tempus at gravida non, pharetra in metus.</p>'
            ],
            [
                'time' => time(),
                'image' => 'news4_preview.jpg',
                'head' => 'Iusto quos veniam magni totam 4',
                'text' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris non nisl ultrices, condimentum mi nec, pellentesque turpis. Donec aliquam dui vel metus tempor pulvinar. Nulla a odio nec nisl malesuada venenatis nec vel dui. Donec finibus, dolor ac commodo iaculis, ex elit tristique turpis, id consectetur metus tellus non diam. Duis a congue diam. Nam at iaculis quam. Aliquam scelerisque mi vel leo gravida, in tristique nibh dictum. Curabitur vitae augue ullamcorper, placerat nibh sed, molestie arcu. Maecenas libero sapien, volutpat et justo ut, sollicitudin placerat ante. Morbi facilisis, metus vel fermentum aliquet, turpis neque hendrerit lacus, id vehicula nibh lacus id lorem. Duis volutpat in tortor et lacinia. Donec ipsum lacus, varius sit amet elementum ut, cursus vitae orci. Vivamus commodo orci a velit pellentesque, at condimentum elit molestie. Nam mauris quam, varius porta rhoncus a, congue a dui. Praesent quis ipsum nibh. Sed mi ante, malesuada eget malesuada non, scelerisque ac ex.</p><p>Praesent volutpat tincidunt nisl placerat commodo. Vivamus in luctus ex, ac vestibulum erat. Suspendisse cursus vulputate lectus at aliquet. Etiam finibus dolor lacus, eu aliquam ipsum pellentesque porta. Duis facilisis lectus felis, id ornare lorem euismod a. In laoreet urna ac ligula sodales gravida. Nunc dignissim orci vel leo mollis consectetur. Proin vel augue eu est pharetra tincidunt vitae ac tellus. Vestibulum varius in lorem a porta. Nulla metus eros, pretium eu auctor sit amet, iaculis ut odio. Etiam et lectus mi. Suspendisse justo elit, congue eget enim et, porta imperdiet sapien. Vivamus posuere id lacus nec luctus. Ut sed arcu non mi efficitur varius at at eros. Sed non tempor lectus.</p>'
            ],
        ];

        foreach($data as $item) {
            $item['slug'] = Str::slug($item['head']);
            News::create($item);
        }
    }
}

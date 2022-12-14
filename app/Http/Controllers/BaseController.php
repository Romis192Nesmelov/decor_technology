<?php

namespace App\Http\Controllers;
use App\Models\Setting;
use App\Models\Carousel;
use App\Models\Icon;
use App\Models\News;
use App\Models\Partner;
use App\Models\Question;
use App\Models\Contact;
//use Illuminate\Http\Request;

class BaseController extends Controller
{
    use HelperTrait;

    private $mainMenu = [
        'menu1' => ['scroll' => 'about', 'name' => 'О компании'],
        'menu2' => ['scroll' => 'why_us', 'name' => 'Почему мы?'],
        'menu3' => ['scroll' => 'news', 'name' => 'Новости'],
        'menu4' => ['href' => 'portfolio', 'name' => 'Портфолио', 'sub' => [
            'sub1' => ['href' => 'presentations', 'name' => 'Оформление презентаций'],
            'sub2' => ['href' => 'photo_zones', 'name' => 'Фотозоны'],
            'sub3' => ['href' => 'automotive_brands', 'name' => 'Автомобильные бренды'],
            'sub4' => ['href' => 'press_walls', 'name' => 'Прессволы'],
            'sub5' => ['href' => 'podiums_and_decorations', 'name' => 'Подиумы и декорации'],
            'sub6' => ['href' => 'street_scenes', 'name' => 'Уличные сцены'],
            'sub7' => ['href' => 'street_decorations', 'name' => 'Уличное декоративное оформление'],
            'sub9' => ['href' => 'conferences', 'name' => 'Конференции'],
            'sub10' => ['href' => 'festivals', 'name' => 'Фестивали'],
        ]],
        'menu5' => ['scroll' => 'production', 'name' => 'Наше производство'],
        'menu6' => ['scroll' => 'partners', 'name' => 'Наши партнеры'],
        'menu7' => ['scroll' => 'faq', 'name' => 'Вопрос-ответ'],
        'menu8' => ['scroll' => 'contacts', 'name' => 'Контакты']
    ];

    public function index()
    {
        return $this->showView('home',[
            'icons' => Icon::all(),
            'news' => News::orderBy('id', 'desc')->limit(4)->get(),
            'partners' => Partner::all(),
            'faq' => Question::all(),
            'contacts' => Contact::all()
        ]);
    }

    public function news()
    {
        return $this->showView('news',[
            'news' => News::orderBy('id', 'desc')->limit(4)->paginate(12)
        ]);
    }

    public function portfolio($slug)
    {

    }

    private function showView($view, array $paramsArr = [])
    {
        return view($view,
            array_merge(
                $paramsArr,
                [
                    'menu' => $this->mainMenu,
                    'carousel' => Carousel::all(),
                    'metas' => $this->metas,
                    'settings' => Setting::find(1)
                ]
            )
        );
    }
}

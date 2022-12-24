<?php

namespace App\Http\Controllers;
use App\Models\Setting;
use App\Models\Carousel;
use App\Models\Icon;
use App\Models\News;
use App\Models\Partner;
use App\Models\Question;
use App\Models\Contact;
use App\Models\Job;
use App\Models\Production;
use Illuminate\Support\Facades\Cache;
//use Illuminate\Http\Request;

class BaseController extends Controller
{
    use HelperTrait;

    public function index()
    {
//        Cache::flush();
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
        Cache::flush();
        return $this->showView('portfolio', [
            'activeMenuName' => 'menu4',
            'slug' => $slug,
            'job' => Cache::remember('job_'.$slug, (60 * 60 * 24 * 365), function() use($slug) {
                if (!$job = Job::where('slug',$slug)->where('active',1)->first()) abort(404);
                return $job;
            })
        ]);
    }

    private function showView($view, array $paramsArr = [])
    {
        $mainMenu = [
            'menu1' => ['scroll' => 'about', 'name' => 'О компании'],
            'menu2' => ['scroll' => 'why_us', 'name' => 'Почему мы?'],
            'menu3' => ['scroll' => 'news', 'name' => 'Новости'],
            'menu4' => ['href' => 'portfolio', 'name' => 'Портфолио', 'sub' => []],
            'menu5' => ['scroll' => 'production', 'name' => 'Наше производство'],
            'menu6' => ['scroll' => 'partners', 'name' => 'Наши партнеры'],
            'menu7' => ['scroll' => 'faq', 'name' => 'Вопрос-ответ'],
            'menu8' => ['scroll' => 'contacts', 'name' => 'Контакты']
        ];

        return view($view,
            array_merge(
                $paramsArr,
                [
                    'menu' => Cache::remember('menu', (60 * 60 * 24 * 365), function() use($mainMenu) {
                        $jobs = Job::where('active',1)->get();
                        foreach ($jobs as $job) {
                            $mainMenu['menu4']['sub']['job'.$job->id] = ['href' => $job->slug, 'name' => $job->name];
                        }
                        return $mainMenu;
                    }),
                    'since' => $this->sinceYear(date('Y') - 2004),
                    'carousel' => Carousel::all(),
                    'production' => Production::all(),
                    'metas' => $this->metas,
                    'settings' => Setting::find(1)
                ]
            )
        );
    }
}
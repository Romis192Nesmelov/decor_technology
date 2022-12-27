<?php

namespace App\Http\Controllers;
use App\Models\Contact;
use App\Models\Icon;
use App\Models\Job;
use App\Models\JobImage;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Carousel;
use App\Models\News;
use App\Models\Setting;
use App\Models\Content;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    use HelperTrait;

    private array $data = [];
    private array $breadcrumbs = [];
    private array $menu;

    public function __construct()
    {
        $this->menu = [
            'home' => [
                'id' => 'home',
                'href' => 'admin.home',
                'name' => trans('admin_menu.home'),
                'description' => '',
                'icon' => 'icon-home2',
            ],
            'settings' => [
                'id' => 'settings',
                'href' => 'admin.settings',
                'name' => trans('admin_menu.settings'),
                'description' => trans('admin_menu.settings_description'),
                'icon' => 'icon-gear',
            ],
            'users' => [
                'id' => 'users',
                'href' => 'admin.users',
                'name' => trans('admin_menu.admins'),
                'description' => trans('admin_menu.admins_description'),
                'icon' => 'icon-users',
            ],
            'why_us' => [
                'id' => 'why_us',
                'href' => 'admin.why_us',
                'name' => trans('admin_menu.why_us'),
                'description' => trans('admin_menu.why_us_description'),
                'icon' => 'icon-people',
            ],
            'carousel' => [
                'id' => 'carousel',
                'href' => 'admin.carousel',
                'name' => trans('admin_menu.carousel'),
                'description' => trans('admin_menu.carousel_description'),
                'icon' => 'icon-image3',
            ],
            'news' => [
                'id' => 'news',
                'href' => 'admin.news',
                'name' => trans('admin_menu.news'),
                'description' => trans('admin_menu.news_description'),
                'icon' => 'icon-newspaper2',
            ],
            'content' => [
                'id' => 'content',
                'href' => 'admin.contents',
                'name' => trans('admin_menu.content'),
                'description' => trans('admin_menu.content_description'),
                'icon' => 'icon-puzzle2',
            ],
            'jobs' => [
                'id' => 'jobs',
                'href' => 'admin.jobs',
                'name' => trans('admin_menu.portfolio'),
                'description' => trans('admin_menu.portfolio_description'),
                'icon' => 'icon-portfolio',
            ],
            'contacts' => [
                'id' => 'contacts',
                'href' => 'admin.contacts',
                'name' => trans('admin_menu.contacts'),
                'description' => trans('admin_menu.contacts_description'),
                'icon' => 'icon-collaboration',
            ]
        ];
        $this->breadcrumbs[] = $this->menu['home'];
    }

    public function home()
    {
        return $this->showView('home');
    }

    public function users(Request $request, $slug=null)
    {
        $this->data['menu_key'] = 'users';
        $this->breadcrumbs[] = $this->menu['users'];
        if ($request->has('id')) {
            $this->data['user'] = User::findOrFail($request->input('id'));
            $this->breadcrumbs[] = [
                'id' => $this->menu['users']['id'],
                'href' => $this->menu['users']['href'],
                'params' => ['id' => $this->data['user']->id],
                'name' => trans('content.edit_user', ['user' => $this->data['user']->email]),
            ];
            return $this->showView('user');
        } else if ($slug && $slug == 'add') {
            $this->breadcrumbs[] = [
                'id' => $this->menu['users']['id'],
                'href' => $this->menu['users']['href'],
                'slug' => 'add',
                'name' => trans('content.adding_user'),
            ];
            return $this->showView('user');
        } else {
            $this->data['users'] = User::all();
            return $this->showView('users');
        }
    }

    public function editUser(Request $request)
    {
        $validationArr = ['email' => 'required|email|unique:users,email'];
        if ($request->has('id')) {
            $validationArr['id'] = 'required|integer|exists:users,id';
            $validationArr['email'] .= ','.$request->input('id');
            if ($request->input('password')) $validationArr['password'] = $this->validationPassword;
            $fields = $this->validate($request, $validationArr);
            $user = User::find($request->input('id'));
            if ($request->input('password')) $fields['password'] = bcrypt($fields['password']);
            $user->update($fields);
        } else {
            $validationArr['password'] = $this->validationPassword;
            $fields = $this->validate($request, $validationArr);
            $fields['password'] = bcrypt($fields['password']);
            User::create($fields);
        }
        $this->saveCompleteMessage();
        return redirect(route('admin.users'));
    }

    public function deleteUser(Request $request)
    {
        return $this->deleteSomething($request, new User());
    }

    public function carousel(Request $request, $slug=null)
    {
        return $this->getSomething(
            $request,new Carousel(),
            'carousel',
            'slides',
            $slug,
            'content.edit_slide',
            'content.adding_slide',
            'slides',
            'slide'
        );
    }

    public function editCarousel(Request $request)
    {
        $validationArr = [
            'head' => $this->validationSmallString,
            'text' => $this->validationSmallString,
        ];

        return $this->editSometing (
            $request,
            new Carousel(),
            $validationArr,
            'carousel',
            $this->validationJpg,
            'images/carousel',
            'image%id%.jpg',
            'image'
        );
    }

    public function deleteCarousel(Request $request)
    {
        return $this->deleteSomething($request, new Carousel(), 'image', 'images/carousel');
    }

    public function news(Request $request, $slug=null)
    {
        return $this->getSomething(
            $request,new News(),
            'news',
            'news',
            $slug,
            'content.edit_news',
            'content.adding_news',
            'all_news',
            'news'
        );
    }

    public function editNews(Request $request)
    {
        $validationArr = [
            'time' => $this->validationDate,
            'head' => $this->validationString,
            'text' => $this->validationText,
        ];

        return $this->editSometing (
            $request,
            new News(),
            $validationArr,
            'news',
            $this->validationJpg,
            'images/news',
            'news%id%.jpg',
            'image'
        );
    }

    public function deleteNews(Request $request)
    {
        return $this->deleteSomething($request, new News(), 'image', 'images/news');
    }

    public function settings()
    {
        $this->breadcrumbs[] = $this->menu['settings'];
        $this->data['metas'] = $this->metas;
        $this->data['settings'] = Setting::find(1);
        return $this->showView('settings');
    }

    public function editSettings(Request $request)
    {
        $validationArr = ['title' => $this->validationString];

        foreach ($this->metas as $meta => $params) {
            if ($request->has($meta) && $request->input($meta)) {
                $validationArr[$meta] = $this->validationString;
            }
        }
        $fields = $this->validate($request, $validationArr);
        $settings = Setting::find(1);
        $settings->update($fields);
        $this->saveCompleteMessage();
        return redirect(route('admin.settings'));
    }

    public function contacts(Request $request)
    {
        return $this->getSomething(
            $request,new Contact(),
            'contacts',
            'contacts',
            null,
            'content.edit_contact',
            'content.adding_contact',
            'contacts',
            'contact'
        );
    }

    public function editContact(Request $request)
    {
        $validationArr = ['contact' => $this->validationSmallString];
        return $this->editSometing (
            $request,
            new Contact(),
            $validationArr,
            'contacts'
        );
    }

    public function deleteContact(Request $request)
    {
        return $this->deleteSomething($request, new Contact());
    }

    public function whyUs(Request $request, $slug=null)
    {
        return $this->getSomething(
            $request,new Icon(),
            'why_us',
            'icons',
            $slug,
            'content.edit_icon',
            'content.adding_icon',
            'icons',
            'icon'
        );
    }

    public function editWhyUs(Request $request)
    {
        $validationArr = [
            'head' => $this->validationSmallString,
            'text' => $this->validationSmallString
        ];

        return $this->editSometing (
            $request,
            new Icon,
            $validationArr,
            'why_us',
            $this->validationSvg,
            'images/icons',
            'icon%id%.svg',
            'icon'
        );
    }

    public function deleteWhyUs(Request $request)
    {
        return $this->deleteSomething($request, new Icon(), 'icon', 'images/icons');
    }

    public function jobs(Request $request, $slug=null)
    {
        $this->data['jobs'] = Job::all();
        return $this->getSomething (
            $request,
            new Job(),
            'jobs',
            'jobs',
            $slug,
            'content.edit_project',
            'content.adding_project',
            'jobs',
            'job'
        );
    }

    public function editJob(Request $request)
    {
        $validationArr = [
            'name' => $this->validationString,
            'description' => $this->validationText
        ];

        return $this->editSometing (
            $request,
            new Job(),
            $validationArr,
            'jobs'
        );
    }

    public function deleteJob(Request $request)
    {
        return $this->deleteSomething($request, new Job(), null, 'images/portfolio');
    }

    public function contents(Request $request)
    {
        return $this->getSomething(
            $request,new Content(),
            'content',
            'contents',
            null,
            'content.edit_content',
            '',
            'contents',
            'content'
        );
    }

    public function editContent(Request $request)
    {
        $validationArr = ['text' => $this->validationText];

        return $this->editSometing (
            $request,
            new Content(),
            $validationArr,
            'contents'
        );
    }

    private function getSomething (
        Request $request,
        Model $model,
        string $menuKey,
        string $itemName,
        string $slug = null,
        string $editNameTitle,
        string $addNameTitle,
        string $viewForList,
        string $viewForOne
    )
    {
        $this->data['menu_key'] = $menuKey;
        $this->breadcrumbs[] = $this->menu[$menuKey];
        if ($request->has('id')) {
            $itemName = $itemName == 'news' ? 'news' : substr($itemName, 0, -1);
            $this->data[$itemName] = $model->find($request->input('id'));
            $this->breadcrumbs[] = [
                'id' => $this->menu[$menuKey]['id'],
                'href' => $this->menu[$menuKey]['href'],
                'params' => ['id' => $this->data[$itemName]->id],
                'name' => trans($editNameTitle, ['id' => $this->data[$itemName]->id]),
            ];
            return $this->showView($viewForOne);
        } else if ($slug && $slug == 'add') {
            $this->breadcrumbs[] = [
                'id' => $this->menu[$menuKey]['id'],
                'href' => $this->menu[$menuKey]['href'],
                'slug' => 'add',
                'name' => trans($addNameTitle),
            ];
            return $this->showView($viewForOne);
        } else {
            if ($model instanceof News) $this->data[$itemName] = $model->orderBy('time','desc')->get();
            else $this->data[$itemName] = $model->all();
            return $this->showView($viewForList);
        }
    }

    private function editSometing (
        Request $request,
        Model $model,
        array $validationArr,
        string $returnRoute,
        string $validationImage = null,
        string $pathToImages = null,
        string $imageName = null,
        string $imageField = null
    )
    {
        if ($model instanceof Job) {
            $validationImages = [];
            $required = $request->has('id') ? '' : 'required|';
            for ($i=1;$i!=4;$i++) {
                $validationImages[] = [
                    'preview'.$i => $required.$validationImage,
                    'full'.$i => $required.$validationImage,
                ];
            }
            $validationArr = array_merge($validationArr,$validationImages);
        }
        $useSlug = array_search('slug',$model->getFillable()) !== false;

        if ($request->has('id')) {
            $validationArr['id'] = 'required|integer|exists:'.$model->getTable().',id';
            if ($validationImage) $validationArr = array_merge($validationArr,[$imageField => $validationImage]);
            $fields = $this->validate($request, $validationArr);

            if (isset($fields['time'])) $fields['time'] = $this->convertTime($fields['time']);
            if ($useSlug) $fields['slug'] = Str::slug($fields['name']);
            if ($this->getBool('active',$model)) $fields['active'] = $request->active == 'on';
            if ($this->getBool('is_phone',$model)) $fields['is_phone'] = $request->is_phone == 'on';

            $table = $model->find($request->input('id'));
            $table->update($fields);
        } else {
            if ($validationImage) $validationArr = array_merge($validationArr,[$imageField => 'required|'.$validationImage]);
            $fields = $this->validate($request, $validationArr);

            if ($imageField) $fields[$imageField] = 'empty';
            if (isset($fields['time'])) $fields['time'] = $this->convertTime($fields['time']);
            if ($useSlug) $fields['slug'] = Str::slug($fields['name']);
            if ($this->getBool('active',$model)) $fields['active'] = $request->active == 'on';
            if ($this->getBool('is_phone',$model)) $fields['is_phone'] = $request->is_phone == 'on';

            $table = $model->create($fields);

            if ($model instanceof Job) {
                for ($i=1;$i<=4;$i++) {
                    JobImage::create([
                        'preview' => 'job'.$table->id.'_'.$i.'_preview.jpg',
                        'full' => 'job'.$table->id.'_'.$i.'_full.jpg',
                        'job_id' => $table->id
                    ]);
                }
            }

            if ($imageField) {
                $imageName = str_replace('%id%',$table->id,$imageName);
                $table->update([$imageField => $imageName]);
            }
        }

        if ($model instanceof Job) {
            for ($i=1;$i<=4;$i++) {
                foreach (['preview','full'] as $suffix) {
                    $imageField = $suffix.$i;
                    $fileName = 'job'.$table->id.'_'.$i.'_'.$suffix.'.jpg';
                    if ($request->hasFile($imageField)) $this->processingFile($request, $imageField, 'images/portfolio', $fileName);
                }
            }
        } elseif ($pathToImages && $request->hasFile($imageField)) $this->processingFile($request, $imageField, $pathToImages, $imageName);

        $this->saveCompleteMessage();
        return redirect(route('admin.'.$returnRoute));
    }

    private function deleteSomething(Request $request, Model $model, $imageField=null, $pathToImage=null)
    {
        $this->validate($request, ['id' => 'required|integer|exists:'.$model->getTable().',id']);
        $table = $model->find($request->input('id'));

        if ($imageField && isset($table[$imageField]) && $table[$imageField] && file_exists(base_path('public/'.$pathToImage.'/'.$table[$imageField]))) {
            unlink(base_path('public/'.$pathToImage.'/'.$table[$imageField]));

        } elseif (isset($table->images)) {
            foreach ($table->images as $image) {
                if (file_exists(base_path('public/'.$pathToImage.'/'.$image->preview))) unlink(base_path('public/'.$pathToImage.'/'.$image->preview));
                if (file_exists(base_path('public/'.$pathToImage.'/'.$image->full))) unlink(base_path('public/'.$pathToImage.'/'.$image->full));
            }
        }

        $table->delete();
        return response()->json(['success' => true]);
    }

    private function showView($view)
    {
        return view('admin.'.$view, [
            'breadcrumbs' => $this->breadcrumbs,
            'data' => $this->data,
            'menu' => $this->menu
        ]);
    }
}

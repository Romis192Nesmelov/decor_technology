<!doctype html>
<html>
<head>
    <title>{{ $settings->title.(isset($title) ? '. '.$title : '') }}</title>
    @foreach($metas as $meta => $params)
        @if ($settings[$meta])
            <meta {{ $params['name'] ? 'name='.$params['name'] : 'property='.$params['property'] }} content="{{ $settings[$meta] }}">
        @endif
    @endforeach
    <meta charset="utf-8">
    <meta name="viewport" content="user-scalable=no, initial-scale=1.0, maximum-scale=1.0, width=device-width">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="default">
    <meta name="msapplication-TileColor" content="#ed7e23">
    <meta name="theme-color" content="#ffffff">

    @include('blocks.favicon_block')

    <link href="https://fonts.googleapis.com/css?family=DM+Sans:300,400,700&amp;display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link href="{{ asset('css/icons/icomoon/styles.css') }}" rel="stylesheet">
    <link href="{{ asset('css/icons/fontawesome/styles.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('css/fancybox.css') }}" rel="stylesheet">
    <link href="{{ asset('css/owl.carousel.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/owl.theme.default.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-3.6.1.min.js" type="text/javascript"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="{{ asset('js/jquery.easing.1.3.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/jquery.animateNumber.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/aos.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/fancybox.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/jquery.maskedinput.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/owl.carousel.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/feedback.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/main.js') }}" type="text/javascript"></script>
</head>

<body>
    <x-modal id="tech-modal">
        <div class="modal-body"></div>
    </x-modal>

    <x-modal head="?????????????????????? ??????!" id="feedback-modal">
        <form class="form" method="post" action="{{ route('feedback') }}">
            @csrf
            <div class="modal-body">
                <div class="input-group flex-nowrap mb-3">
                    <span class="input-group-text" id="addon-wrapping"><i class="icon-iphone"></i></span>
                    <input type="text" placeholder="+7(___)___-__-__" class="form-control" name="phone">
                </div>
                @include('blocks.checkbox_block',[
                    'id' => 'agree-check',
                    'checked' => true,
                    'name' => 'agree',
                    'label' => '?????? ???????????????? ???? ?????????????????? ???????????????????????? ????????????',
                ])
            </div>
            <div class="modal-footer">
                <button type="submit" disabled class="btn btn-primary rounded-0">??????????????????</button>
            </div>
        </form>
    </x-modal>

    {{-- Main menu--}}
    <nav id="main-nav" class="navbar navbar-expand-lg bg-light">
        <div class="container d-flex justify-content-center-md">
            <a class="navbar-brand" href="/">
                <img id="main-logo" src="{{ asset('images/logo_pos.svg') }}" alt="logo">
                <img id="main-logo-small" src="{{ asset('images/logo_pos_small.svg') }}" alt="logo">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="?????????????????????????? ??????????????????">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mb-2 mb-lg-0">
                    @foreach($menu as $itemName => $item)
                        @if(isset($item['sub']) && count($item['sub']))
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle {{ isset($activeMenuName) && $activeMenuName == $itemName ? 'active' : '' }}" href="#" id="{{ 'navbarDropdown'.ucfirst($itemName) }}" role="button" data-bs-toggle="dropdown" aria-expanded="false">{{ $item['name'] }}</a>
                                <ul class="dropdown-menu" aria-labelledby="{{ 'navbarDropdown'.ucfirst($itemName) }}">
                                    @foreach($item['sub'] as $subItemName => $subItem)
                                        @include('blocks.main_menu_item_block',[
                                            'aClass' => 'dropdown-item',
                                            'menuItem' => $subItem,
                                            'activeFlag' => isset($slug) && $subItem['href'] && $slug == $subItem['href'],
                                            'routePrefix' => $item['href']
                                        ])
                                    @endforeach
                                </ul>
                            </li>
                        @else
                            @include('blocks.main_menu_item_block',[
                                'liClass' => 'nav-item',
                                'aClass' => 'nav-link',
                                'menuItem' => $item,
                                'activeFlag' => isset($activeMenuName) && $activeMenuName == $itemName
                            ])
                        @endif
                    @endforeach
{{--                <form class="d-flex" role="search">--}}
{{--                    <input class="form-control me-2" type="search" placeholder="??????????" aria-label="??????????">--}}
{{--                    <button class="btn btn-outline-success" type="submit">??????????</button>--}}
{{--                </form>--}}
            </div>
        </div>
    </nav>
    {{-- //main menu--}}

    <div data-scroll-destination="home" class="container-fluid p-0">
        <div id="main-carousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                @foreach($carousel as $k => $item)
                    <button type="button" data-bs-target="#main-carousel" data-bs-slide-to="{{ $k }}" {{ $loop->first ? 'class=active' : '' }} aria-current="true" aria-label="{{ 'slide'.$item->id }}"></button>
                @endforeach
            </div>
            <div class="carousel-inner">
                @foreach($carousel as $item)
                    <div class="carousel-item {{ $loop->first ? 'active' : '' }}" style="background-image: url({{ asset('images/carousel/'.$item->image) }})">
                        <div class="carousel-square {{ request()->path() != '/' ? 'small' : '' }}">
                            <h1 {{ request()->path() != '/' ? 'class=small' : '' }}>{{ $item->head }}</h1>
                            <p class="{{ request()->path() != '/' ? 'small m-3' : 'my-5' }}">{{ $item->text }}</p>
                            <p class="mb-0"><button class="btn btn-primary rounded-0" data-bs-toggle="modal" data-bs-target="#feedback-modal">???????????????? ??????????</button></p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    @yield('content')

    <footer class="site-footer">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-7">
                            <h2 class="footer-heading mb-4">{{ $menu['menu1']['name'] }}</h2>
                            <p>{{ explode('.',str_replace('%since%',$since,strip_tags($about->text)))[0] }}.</p>
                        </div>
                        <div class="col-md-4 ml-auto">
                            <ul class="list-unstyled">
                                @foreach($menu as $item)
                                    @if(!isset($item['sub']))
                                        @include('blocks.main_menu_item_block',['menuItem' => $item])
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 ml-auto">
                    <div class="mb-5">
                        <h2 class="footer-heading mb-4">???????????????? ??????????</h2>
                        <form action="{{ route('feedback') }}" method="post" class="form footer-suscribe-form">
                            @csrf
                            <div class="input-group mb-3">
                                <input class="form-control rounded-0 border-secondary text-white bg-transparent" placeholder="+7(___)___-__-__" name="phone">
                                <div class="input-group-append">
                                    <button class="btn btn-primary text-white rounded-0" type="submit" disabled>??????????????????????!</button>
                                </div>
                            </div>
                            @include('blocks.checkbox_block',[
                                'id' => 'agree-check',
                                'checked' => true,
                                'name' => 'agree',
                                'label' => '?????? ???????????????? ???? ?????????????????? ???????????????????????? ????????????',
                            ])
                        </form>
                    </div>
{{--                    <h2 class="footer-heading mb-4">???????? ???????????? ?? ????????</h2>--}}
{{--                    <a href="#" class="smoothscroll px-0"><span class="icon-facebook"></span></a>--}}
{{--                    <a href="#" class="px-3 pr-3"><span class="icon-instagram"></span></a>--}}
{{--                    <a href="#" class="px-3 pr-3"><span class="fa fa-vk"></span></a>--}}
{{--                    <a href="#" class="px-3 pr-3"><span class="icon-cloud2"></span></a>--}}
                </div>
            </div>
            <div class="row pt-5 mt-5 text-center">
                <div class="col-md-12">
                    <div class="pt-5">
                        <p class="small">Copyright ??2022 Decor Technology</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <div id="on-top-button" data-scroll="home"><i class="icon-arrow-up12"></i></div>
</body>
</html>

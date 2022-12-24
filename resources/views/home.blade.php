@extends('layouts.main')

@section('content')
    <section class="gray bg1 py-5" data-scroll-destination="{{ $menu['menu1']['scroll'] }}">
        <div class="container">
            <div class="row align-items-stretch">
                <div class="col-lg-4">
                    <div class="h-90 bg-white box box-offset">
                        <h2>{{ $menu['menu1']['name'] }}</h2>
                        <p>Уже <x-since year="{{ date('Y') - 2004 }}"></x-since> наша компания <b>Dekor Technology</b> занимается производством и оформлением декораций для различных мероприятий. За это время мы смогли наладить собственное производство и собрать команду высококвалифицированных специалистов, которые готовы выполнить ваш заказ любой сложности.</p>
                        <p>Такие агентства, как <b>Еventum Рremo</b>, <b>Karandash</b>, <b>Аction</b> и многие другие доверяют оформление своих мероприятий именно нам. Компания <b>Dekor Technology</b> готова выполнить ваш заказ с использованием любых материалов в любой сфере декорационного оформления, а наши цены и скидки приятно Вас удивят.</p>
                        <p class="mt-5">
                            <span class="d-block font-weight-bold text-black"><b>Алексей Сухин</b></span>
                            <span class="d-block font-weight-bold text-muted">Генеральный директор</span>
                        </p>
                    </div>
                </div>
                <div class="col-lg-8 offset-image" style="background-image: url({{ asset('images/about.jpg') }});"></div>
            </div>
        </div>
    </section>

    <section class="py-5" data-scroll-destination="{{ $menu['menu2']['scroll'] }}">
        <div class="container">
            <h2>{{ $menu['menu2']['name'] }}</h2>
            <div class="row">
                @foreach($icons as $k => $icon)
                    <div class="col-md-6 mb-4 col-lg-4 aos-init aos-animate" data-aos="fade-up" data-aos-delay="{{ ($k+1) * 150 }}">
                        <div class="box-icons text-center">
                            <span class="img-wrap mb-5">
                                <img src="{{ asset('images/icons/'.$icon->icon) }}" class="img-fluid">
                            </span>
                            <h3 class="mb-4">{{ $icon->head }}</h3>
                            <p>{{ $icon->text }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="gray bg2 py-5" data-scroll-destination="{{ $menu['menu3']['scroll'] }}">
        <div class="container">
            <div class="row align-items-stretch">
                <h2>{{ $menu['menu3']['name'] }}</h2>
                @foreach($news as $k => $new)
                    <div class="col-lg-3 col-md-6 mb-5 news-block aos-init aos-animate" id="new{{ $new->id }}" data-aos="fade-up" data-aos-delay="{{ ($k+1) * 150 }}">
                        <div class="news-entry-1 h-100">
                            <div class="news-entry-1-contents">
                                <div class="meta">{{ date('d.m.Y',$new->time) }}</div>
                                <img class="w-100" src="{{ asset('images/news/'.$new->image) }}" />
                                <h2>{{ $new->head }}</h2>
                                <p class="my-3"><span class="more">Подробнее <i class="icon-arrow-right7"></i></span></p>
                            </div>
                        </div>
                    </div>
                @endforeach
                <a class="m-auto w-25 btn btn-primary rounded-0" href="{{ route('news') }}">Читать все новости</a>
            </div>
        </div>
    </section>

    <section class="py-5" data-scroll-destination="{{ $menu['menu5']['scroll'] }}">
        <div class="container">
            <div class="row">
                <h2>{{ $menu['menu5']['name'] }}</h2>
                <div class="owl-carousel production">
                    @foreach($production as $photo)
                        <a class="img-preview" href="{{ asset('images/production/'.$photo->full) }}">
                            <img class="w-100" src="{{ asset('images/production/'.$photo->preview) }}" />
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <section class="gray bg3 py-5" data-scroll-destination="{{ $menu['menu6']['scroll'] }}">
        <div class="container">
            <div class="row align-items-stretch">
                <h2>{{ $menu['menu6']['name'] }}</h2>
                @foreach($partners as $k => $partner)
                    <div class="col-lg-3 col-md-3 my-3 aos-init aos-animate" data-aos="fade-up" data-aos-delay="{{ ($k+1) * 150 }}">
                        <div class="box-icons text-center">
                            <div class="img-wrap mb-5 partner-logo">
                                <img src="{{ asset('images/partners/'.$partner->logo) }}" alt="{{ $partner->name }}" class="w-100 logo">
                            </div>
                            <h3 class="mt-4">{!! $partner->name !!}</h3>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="py-5" data-scroll-destination="{{ $menu['menu7']['scroll'] }}">
        <div class="container">
            <div class="row align-items-stretch">
                <h2>{{ $menu['menu7']['name'] }}</h2>
                <div class="accordion accordion-flush" id="accordionFlushExample">
                    @foreach($faq as $qa)
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingOne">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="{{ '#flush-collapse'.$qa->id }}" aria-expanded="false" aria-controls="{{ 'flush-collapse'.$qa->id }}">{{ $qa->question }}</button>
                            </h2>
                            <div id="{{ 'flush-collapse'.$qa->id }}" class="accordion-collapse collapse" aria-labelledby="{{ 'flush-heading'.$qa->id }}">
                                <div class="accordion-body">{{ $qa->answer }}</div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <section class="gray bg4 py-5" data-scroll-destination="{{ $menu['menu8']['scroll'] }}">
        <div class="container">
            <div class="row align-items-stretch">
                <h2>{{ $menu['menu8']['name'] }}</h2>
                <div class="col-lg-3 mb-5">
                    @foreach($contacts as $contact)
                        <p>
                            <i class="{{ $contact->is_phone ? 'icon-phone-wave' : 'icon-envelop5' }} mx-2"></i>
                            @if($contact->is_phone)
                                <a class="mx-1" href="tel:{{ substr(str_replace(['-','(',')','+',' '],'',$contact->contact) ,1) }}">{{ $contact->contact }}</a>
                                {{ $contact->name ? $contact->name : $contact->contact }}
                            @else
                                <a class="mx-1" href="mailto:{{ $contact->contact }}">{{ $contact->name ? $contact->name : $contact->contact }}</a>
                            @endif
                        </p>
                    @endforeach
                </div>
                <div class="col-lg-9 mb-5">
                    <iframe src="https://yandex.ru/map-widget/v1/-/CCUnU2SULC" width="100%" height="600" frameborder="1" allowfullscreen="true" style="position:relative;"></iframe>
                </div>
            </div>
        </div>
    </section>

@endsection

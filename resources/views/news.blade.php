@extends('layouts.main', ['title' => 'Новости'])

@section('content')
    <section class="gray bg4 py-5">
        <div class="container">
            <div class="row align-items-stretch">
                <h2>{{ $menu['menu3']['name'] }}</h2>
                @foreach($news as $new)
                    <div class="col-lg-3 col-md-6 mb-5 news-block" id="new{{ $new->id }}">
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
                {{ $news->onEachSide(5)->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </section>
@endsection

@extends('layouts.main', ['title' => 'Портфолио. '.$job->name])

@section('content')
    <section class="gray bg5 py-5">
        <div class="container">
            <div class="row align-items-stretch">
                <div class="col-lg-4 col-md-5 col-xs-12">
                    <div class="bg-white box">
                        <h2>{{ $job->name }}</h2>
                        {!! $job->description !!}
                    </div>
                </div>
                <div class="col-lg-8 col-md-7 col-sm-12 col-xs-12 row row-cols-auto">
                    @foreach($job->jobImages as $image)
                        <div class="col-lg-6 col-md-12 col-sm-12">
                            <div class="portfolio-image">
                                <a class="img-preview" href="{{ asset('images/portfolio/'.$image->full) }}">
                                    <img class="w-100" src="{{ asset('images/portfolio/'.$image->preview) }}" />
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection

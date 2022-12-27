@extends('layouts.admin')

@section('content')
    <div class="panel panel-flat">
        @include('admin.blocks._title_block')
        <div class="panel-body">
            <form class="form-horizontal" enctype="multipart/form-data" action="{{ route('admin.edit_news') }}" method="post">
                @csrf
                @include('admin.blocks._hidden_id_block',['field' => 'news'])
                <div class="panel panel-flat">
                    <div class="panel-body">
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            @include('admin.blocks._input_image_block',[
                                'preview' => isset($data['news']) ? asset('images/news/'.$data['news']->image) : '',
                                'full' => isset($data['news']) ? asset('images/news/'.$data['news']->image) : ''
                            ])
                        </div>
                        <div class="col-md-9 col-sm-6 col-xs-12">
                            @include('admin.blocks._input_date_block',[
                                'label' => trans('content.date_news'),
                                'name' => 'time',
                                'value' => isset($data['news']) ? $data['news']->time : time()
                            ])
                            @include('admin.blocks._input_block', [
                                'required' => true,
                                'label' => trans('content.title_news'),
                                'name' => 'head',
                                'type' => 'text',
                                'placeholder' => trans('content.title_news'),
                                'value' => isset($data['news']) ? $data['news']->head : ''
                            ])
                            @include('admin.blocks._textarea_block',[
                                'simple' => false,
                                'name' => 'text',
                                'label' => trans('content.content_news'),
                                'value' => isset($data['news']) ? $data['news']->text : ''
                            ])
                        </div>
                    </div>
                </div>
                @include('admin.blocks._save_button_block')
            </form>
        </div>
    </div>
@endsection

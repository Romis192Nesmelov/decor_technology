@extends('layouts.admin')

@section('content')
    <div class="panel panel-flat">
        @include('admin.blocks._title_block')
        <div class="panel-body">
            <form class="form-horizontal" enctype="multipart/form-data" action="{{ route('admin.edit_carousel') }}" method="post">
                @csrf
                @include('admin.blocks._hidden_id_block',['field' => 'slide'])
                <div class="panel panel-flat">
                    <div class="panel-body">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            @include('admin.blocks._input_image_block',[
                                'preview' => isset($data['slide']) ? asset('images/carousel/'.$data['slide']->image) : '',
                                'full' => isset($data['slide']) ? asset('images/carousel/'.$data['slide']->image) : ''
                            ])
                        </div>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            @include('admin.blocks._input_block', [
                                'required' => true,
                                'label' => trans('content.title_carousel'),
                                'name' => 'head',
                                'type' => 'text',
                                'placeholder' => trans('content.title_carousel'),
                                'value' => isset($data['slide']) ? $data['slide']->head : ''
                            ])
                            @include('admin.blocks._textarea_block',[
                                'simple' => true,
                                'name' => 'text',
                                'label' => trans('content.text_carousel'),
                                'value' => isset($data['slide']) ? $data['slide']->text : ''
                            ])
                        </div>
                    </div>
                </div>
                @include('admin.blocks._save_button_block')
            </form>
        </div>
    </div>
@endsection

@extends('layouts.admin')

@section('content')
    <div class="panel panel-flat">
        @include('admin.blocks._title_block')
        <div class="panel-body">
            <form class="form-horizontal" enctype="multipart/form-data" action="{{ route('admin.edit_why_us') }}" method="post">
                @csrf
                @include('admin.blocks._hidden_id_block',['field' => 'icon'])
                <div class="panel panel-flat">
                    <div class="panel-body">
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            @include('admin.blocks._input_image_block',[
                                'name' => 'icon',
                                'preview' => isset($data['icon']) ? asset('images/icons/'.$data['icon']->icon) : ''
                            ])
                        </div>
                        <div class="col-md-9 col-sm-6 col-xs-12">
                            @include('admin.blocks._input_block', [
                                'label' => trans('content.head_icon'),
                                'name' => 'head',
                                'type' => 'text',
                                'max' => 100,
                                'placeholder' => trans('content.head_icon'),
                                'value' => isset($data['icon']) ? $data['icon']->head : ''
                            ])
                            @include('admin.blocks._textarea_block',[
                                'simple' => true,
                                'name' => 'text',
                                'value' => isset($data['icon']) ? $data['icon']->text : ''
                            ])
                        </div>
                    </div>
                </div>
                @include('admin.blocks._save_button_block')
            </form>
        </div>
    </div>
@endsection

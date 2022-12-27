@extends('layouts.admin')

@section('content')
    <div class="panel panel-flat">
        @include('admin.blocks._title_block')
        <div class="panel-body">
            <form class="form-horizontal" enctype="multipart/form-data" action="{{ route('admin.edit_job') }}" method="post">
                @csrf
                @include('admin.blocks._hidden_id_block',['field' => 'job'])
                <div class="panel panel-flat">
                    <div class="panel-body">
                        @for ($i=0;$i<4;$i++)
                            <div class="col-md-3 col-sm-6 col-xs-12">
                                @foreach(['preview','full'] as $suffix)
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <h5 class="text-center">{{ $suffix }}</h5>
                                        @include('admin.blocks._input_image_block',[
                                            'name' => $suffix.($i+1),
                                            'preview' => isset($data['job']) ? asset('images/portfolio/'.$data['job']->images[$i][$suffix]) : '',
                                            'full' => isset($data['job']) ? asset('images/portfolio/'.$data['job']->images[$i][$suffix]) : ''
                                        ])
                                    </div>
                                @endforeach
                            </div>
                        @endfor
                        @include('admin.blocks._input_block', [
                            'required' => true,
                            'label' => trans('content.project_name'),
                            'name' => 'name',
                            'type' => 'text',
                            'placeholder' => trans('content.project_name'),
                            'value' => isset($data['job']) ? $data['job']->name : ''
                        ])
                        @include('admin.blocks._textarea_block',[
                            'simple' => false,
                            'name' => 'description',
                            'label' => trans('content.project_description'),
                            'value' => isset($data['job']) ? $data['job']->description : ''
                        ])
                        @include('admin.blocks._checkbox_block',[
                            'name' => 'active',
                            'label' => trans('content.project_is_active'),
                            'checked' => isset($data['job']) ? $data['job']->active : true
                        ])
                    </div>
                </div>
                @include('admin.blocks._save_button_block')
            </form>
        </div>
    </div>
@endsection

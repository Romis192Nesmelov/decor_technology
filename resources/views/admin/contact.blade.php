@extends('layouts.admin')

@section('content')
    <div class="panel panel-flat">
        @include('admin.blocks._title_block')
        <div class="panel-body">
            <form class="form-horizontal" action="{{ route('admin.edit_contact') }}" method="post">
                @csrf
                @include('admin.blocks._hidden_id_block',['field' => 'contact'])
                <div class="panel panel-flat">
                    <div class="panel-body">
                        @include('admin.blocks._input_block', [
                            'required' => false,
                            'label' => trans('content.contact_name'),
                            'name' => 'name',
                            'type' => 'text',
                            'placeholder' => trans('content.contact_name'),
                            'value' => isset($data['contact']) ? $data['contact']->name : ''
                        ])

                        @include('admin.blocks._input_block', [
                            'required' => true,
                            'label' => trans('content.contact'),
                            'name' => 'contact',
                            'type' => 'text',
                            'placeholder' => trans('content.contact'),
                            'value' => isset($data['contact']) ? $data['contact']->contact : ''
                        ])
                    </div>
                </div>
                <div class="panel panel-flat">
                    <div class="panel-body">
                        @include('admin.blocks._checkbox_block',[
                            'name' => 'is_phone',
                            'label' => trans('content.contact_is_phone'),
                            'checked' => $data['contact']->is_phone
                        ])
                    </div>
                </div>
                @include('admin.blocks._save_button_block')
            </form>
        </div>
    </div>
@endsection

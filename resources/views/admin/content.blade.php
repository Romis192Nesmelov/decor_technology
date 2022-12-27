@extends('layouts.admin')

@section('content')
    <div class="panel panel-flat">
        <x-atitle>{{ trans('admin_menu.content') }}</x-atitle>
        <div class="panel-body">
            <form class="form-horizontal" action="{{ route('admin.edit_content') }}" method="post">
                @csrf
                @include('admin.blocks._hidden_id_block',['field' => 'content'])
                @include('admin.blocks._input_block', [
                    'required' => true,
                    'label' => trans('content.title'),
                    'name' => 'head',
                    'type' => 'text',
                    'placeholder' => trans('content.title'),
                    'value' => $data['content']->head
                ])

                @include('admin.blocks._textarea_block',[
                    'simple' => false,
                    'name' => 'text',
                    'label' => trans('content.content'),
                    'value' => $data['content']->text
                ])
                @include('admin.blocks._save_button_block')
            </form>
        </div>
    </div>
@endsection

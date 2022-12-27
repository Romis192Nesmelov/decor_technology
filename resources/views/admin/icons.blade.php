@extends('layouts.admin')

@section('content')
    @include('admin.blocks._modal_delete_block',[
        'modalId' => 'delete-modal',
        'action' => 'delete-why-us',
        'head' => trans('content.do_you_really_want_delete_this_icon')
    ])

    <div class="panel panel-flat">
        <x-atitle>{{ trans('admin_menu.why_us') }}</x-atitle>
        <div class="panel-body">
            <table class="table datatable-basic table-items">
                <tr>
                    <th class="text-center">Id</th>
                    <th class="text-center">{{ trans('content.icon') }}</th>
                    <th class="text-center">{{ trans('content.head_icon') }}</th>
                    <th class="text-center">{{ trans('content.description_icon') }}</th>
                    @include('admin.blocks._th_edit_cell_block')
                    @include('admin.blocks._th_delete_cell_block')
                </tr>
                @foreach ($data['icons'] as $icon)
                    <tr role="row" id="{{ 'icon_'.$icon->id }}">
                        <td class="text-center">{{ $icon->id }}</td>
                        <td class="image text-center"><a class="img-preview" href="{{ asset('images/icons/'.$icon->icon) }}"><img src="{{ asset('images/icons/'.$icon->icon) }}" /></a></td>
                        <td class="text-center head">{{ $icon->head }}</td>
                        <td class="text-center">{{ $icon->text }}</td>
                        @include('admin.blocks._edit_cell_block', ['href' => route($menu[$data['menu_key']]['href'], ['id' => $icon->id])])
                        @include('admin.blocks._delete_cell_block',['id' => $icon->id])
                    </tr>
                @endforeach
            </table>
            @include('admin.blocks._add_button_block',[
                'href' => route($menu[$data['menu_key']]['href']).'/add',
                'text' => trans('content.add_icon')
            ])
        </div>
    </div>
@endsection

@extends('layouts.admin')

@section('content')
    @include('admin.blocks._modal_delete_block',[
        'modalId' => 'delete-modal',
        'action' => 'delete-carousel',
        'head' => trans('content.do_you_really_want_delete_this_slide')
    ])

    <div class="panel panel-flat">
        <x-atitle>{{ trans('admin_menu.carousel') }}</x-atitle>
        <div class="panel-body">
            <table class="table datatable-basic table-items">
                <tr>
                    <th class="text-center">{{ trans('content.slide_carousel') }}</th>
                    <th class="text-center">{{ trans('content.title_carousel') }}</th>
                    <th class="text-center">{{ trans('content.text_carousel') }}</th>
                    <th></th>
                    @include('admin.blocks._th_edit_cell_block')
                    @include('admin.blocks._th_delete_cell_block')
                </tr>
                @foreach ($data['slides'] as $slide)
                    <tr role="row" id="{{ 'slide_'.$slide->id }}">
                        <td class="image"><a class="img-preview" href="{{ asset('images/carousel/'.$slide->image) }}"><img src="{{ asset('images/carousel/'.$slide->image) }}" /></a></td>
                        <td class="text-left head">{{ $slide->head }}</td>
                        <td class="text-left">{{ $slide->text }}</td>
                        <td></td>
                        @include('admin.blocks._edit_cell_block', ['href' => route($menu[$data['menu_key']]['href'], ['id' => $slide->id])])
                        @include('admin.blocks._delete_cell_block',['id' => $slide->id])
                    </tr>
                @endforeach
            </table>
            @include('admin.blocks._add_button_block',[
                'href' => route($menu[$data['menu_key']]['href']).'/add',
                'text' => trans('content.add_slide')
            ])
        </div>
    </div>
@endsection

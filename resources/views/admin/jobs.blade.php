@extends('layouts.admin')

@section('content')
    @include('admin.blocks._modal_delete_block',[
        'modalId' => 'delete-modal',
        'action' => 'delete-job',
        'head' => trans('content.do_you_really_want_delete_this_project')
    ])

    <div class="panel panel-flat">
        <x-atitle>{{ trans('admin_menu.portfolio') }}</x-atitle>
        <div class="panel-body">
            <table class="table datatable-basic table-items">
                <tr>
                    <th class="text-center">{{ trans('content.project_image') }}</th>
                    <th class="text-center">{{ trans('content.project_name') }}</th>
                    <th class="text-center">{{ trans('content.project_description') }}</th>
                    <th class="text-center">{{ trans('content.project_status') }}</th>
                    @include('admin.blocks._th_edit_cell_block')
                    @include('admin.blocks._th_delete_cell_block')
                </tr>
                @foreach ($data['jobs'] as $job)
                    <tr role="row" id="{{ 'project_'.$job->id }}">
                        <td class="image"><a class="img-preview" href="{{ asset('images/portfolio/'.$job->images[0]->preview) }}"><img src="{{ asset('images/portfolio/'.$job->images[0]->preview) }}" /></a></td>
                        <td class="text-left head">{{ $job->name }}</td>
                        <td class="text-left">@include('admin.blocks._cropped_content_block',['croppingContent' => $job->description, 'length' => 300])</td>
                        <td class="text-center">
                            @include('admin.blocks._status_block',[
                                'status' => $job->active,
                                'description' => $job->active ? trans('content.project_is_active') : trans('content.project_not_active')
                              ])
                        </td>
                        @include('admin.blocks._edit_cell_block', ['href' => route($menu[$data['menu_key']]['href'], ['id' => $job->id])])
                        @include('admin.blocks._delete_cell_block',['id' => $job->id])
                    </tr>
                @endforeach
            </table>
            @include('admin.blocks._add_button_block',[
                'href' => route($menu[$data['menu_key']]['href']).'/add',
                'text' => trans('content.add_project')
            ])
        </div>
    </div>
@endsection

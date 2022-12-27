@extends('layouts.admin')

@section('content')
    <div class="panel panel-flat">
        <x-atitle>{{ trans('admin_menu.contacts') }}</x-atitle>
        <div class="panel-body">
            <table class="table datatable-basic table-items">
                <tr>
                    <th></th>
                    <th class="text-center">id</th>
                    <th class="text-center">{{ trans('content.contact_name') }}</th>
                    <th class="text-center">{{ trans('content.contact') }}</th>
                    @include('admin.blocks._th_edit_cell_block')
                    @include('admin.blocks._th_delete_cell_block')
                </tr>
                @foreach ($data['contacts'] as $contact)
                    <tr role="row" id="{{ 'contact_'.$contact->id }}">
                        <td></td>
                        <td class="text-center">{{ $contact->id }}</td>
                        <td class="text-left head">{{ $contact->name }}</td>
                        <td class="text-center">{{ $contact->contact }}</td>
                        @include('admin.blocks._edit_cell_block', ['href' => route($menu[$data['menu_key']]['href'], ['id' => $contact->id])])
                        @include('admin.blocks._delete_cell_block',['id' => $contact->id])
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection

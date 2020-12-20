@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
<div>
    @if ($message = Session::get('success'))
    <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ $message }}</strong>
    </div>
    @endif
    @if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
</div>
<div class="panel panel-default">
    <div class="panel-heading">@lang('global.roles.title')
        <a class="btn-sm btn-primary pull-right" href="{{ route('admin.roles.create') }}">
            <span class="glyphicon glyphicon-plus"></span>@lang('global.app_create')
        </a>
    </div>
    <div class="panel-body table-responsive">
        <table class="table table-bordered table-striped {{ count($roles) > 0 ? 'datatable' : '' }} dt-select">
            <thead>
                <tr>
                    <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
                    <th>@lang('global.roles.fields.name')</th>
                    <th>@lang('global.roles.fields.permission')</th>
                    <th>@lang('global.roles.fields.created_at')</th>
                    <th>@lang('global.roles.fields.updated_at')</th>
                    <th>Maintenance</th>
                </tr>
            </thead>
            <tbody>
                @if (count($roles) > 0)
                @foreach ($roles as $role)
                <tr data-entry-id="{{ $role->id }}">
                    <td></td>
                    <td>{{ $role->name }}</td>
                    <td>
                        @foreach ($role->permissions()->pluck('name') as $permission)
                        <span class="label label-info label-many">{{ $permission }}</span>
                        @endforeach
                    </td>
                    <td>{{ $role->created_at }}</td>
                    <td>{{ $role->updated_at }}</td>
                    <td>
                        <a href="{{route('admin.roles.edit',[$role->id]) }}" button class="btn-xs btn-info"><i class="glyphicon glyphicon-pencil"></i>@lang('global.app_edit')</button></a>
                        {!! Form::open(array(
                        'style' => 'display: inline;',
                        'method' => 'DELETE',
                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                        'route' => ['admin.roles.destroy', $role->id])) !!}
                        {!! Form::submit(trans('global.app_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                        {!! Form::close() !!}
                </tr>
                @endforeach
                @else
                <tr>
                    <td colspan="6">@lang('global.app_no_entries_in_table')</td>
                </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>
@stop
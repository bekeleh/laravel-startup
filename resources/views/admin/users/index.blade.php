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
        <a class="btn-sm btn-primary pull-right" href="{{ route('admin.users.create') }}">
            <span class="glyphicon glyphicon-plus"></span>@lang('global.app_create')
        </a>
    </div>
    <div class="panel-body table-responsive">
        <table class="table table-bordered table-striped {{ count($users) > 0 ? 'datatable' : '' }} dt-select">
            <thead>
                <tr>
                    <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
                    <th>@lang('global.users.fields.name')</th>
                    <th>@lang('global.users.fields.email')</th>
                    <th>@lang('global.users.fields.roles')</th>
                    <th>@lang('global.users.fields.created_at')</th>
                    <th>@lang('global.users.fields.updated_at')</th>
                    <th>Maintenance</th>
                </tr>
            </thead>
            <tbody>
                @if (count($users) > 0)
                @foreach ($users as $user)
                <tr data-entry-id="{{ $user->id }}">
                    <td></td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        @foreach ($user->roles()->pluck('name') as $role)
                        <span class="label label-info label-many">{{ $role }}</span>
                        @endforeach
                    </td>
                    <td>{{ $user->created_at }}</td>
                    <td>{{ $user->updated_at }}</td>
                    <td>
                        @if(Auth::user()->id != $user->id)
                        <a href="{{route('admin.users.edit',[$user->id]) }}" button class="btn-xs btn-info"><i class="glyphicon glyphicon-pencil"></i>@lang('global.app_edit')</button></a>
                        <!-- <a href="{{route('admin.users.edit',[$user->id]) }}" class="btn btn-xs btn-info">@lang('global.app_edit')</a> -->
                        {!! Form::open(array(
                        'style' => 'display: inline-block;',
                        'method' => 'DELETE',
                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                        'route' => ['admin.users.destroy', $user->id])) !!}
                        {!! Form::submit(trans('global.app_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                        {!! Form::close() !!}
                        @endif
                    </td>
                </tr>
                @endforeach
                @else
                <tr>
                    <td colspan="9">@lang('global.app_no_entries_in_table')</td>
                </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>
@stop
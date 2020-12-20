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
    <div class="panel-heading">@lang('global.permissions.title')
        <a class="btn-sm btn-primary pull-right" href="{{ route('admin.permissions.create') }}">
            <span class="glyphicon glyphicon-plus"></span>@lang('global.app_create')
        </a>
    </div>
    <div class="panel-body table-responsive">
        <table class="table table-bordered table-striped {{ count($permissions) > 0 ? 'datatable' : '' }} dt-select">
            <thead>
                <tr>
                    <th style="text-align:center;">
                        <input type="checkbox" id="select-all" /></th>
                    <th> @lang('global.permissions.fields.name')</th>
                    <th>@lang('global.permissions.fields.guard_name')</th>
                    <th>@lang('global.permissions.fields.created_at')</th>
                    <th>@lang('global.permissions.fields.updated_at')</th>
                    <th>Maintenace</th>
                </tr>
            </thead>
            <tbody>
                @if (count($permissions) > 0)
                @foreach ($permissions as $permission)
                <tr data-entry-id="{{ $permission->id }}">
                    <td></td>
                    <td>{{ $permission->name }}</td>
                    <td> {{$permission->guard_name}}</td>
                    <td>{{ $permission->created_at }}</td>
                    <td>{{ $permission->updated_at }}</td>
                    <td>
                        <a href="{{route('admin.permissions.edit',[$permission->id]) }}" button class="btn-xs btn-info"><i class="glyphicon glyphicon-pencil"></i>@lang('global.app_edit')</button></a>
                        <!-- <a href="{{ route('admin.permissions.edit',[$permission->id]) }}" class="btn btn-xs btn-info">@lang('global.app_edit')</a> -->
                        {!! Form::open(array(
                        'style' => 'display: inline-block;',
                        'method' => 'DELETE',
                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                        'route' => ['admin.permissions.destroy', $permission->id])) !!}
                        {!! Form::submit(trans('global.app_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
                @endforeach
                @else
                <tr>
                    <td colspan="3">@lang('global.app_no_entries_in_table')</td>
                </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>
@stop
<!-- @section('javascript')
<script>
    window.route_mass_crud_entries_destroy = '{{route('admin.permissions.mass_destroy') }}';
</script>
@endsection -->
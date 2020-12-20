@extends('layouts.app')

@section('content')
<h3 class="page-title">@lang('global.permissions.title')</h3>
<div class="panel panel-default">
    {!! Form::model($permission, ['method' => 'PUT', 'route' => ['admin.permissions.update', $permission->id]]) !!}
    <div class="panel-heading">
        <a class="btn-sm btn-primary pull-right" href="{{ route('admin.permissions.index') }}">
            <span class="glyphicon glyphicon-share-alt"></span>@lang('global.app_back')
        </a>
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-xs-12 form-group">
                {!! Form::label('name', 'Name*', ['class' => 'control-label']) !!}
                {!! Form::text('name', old('title'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                <p class="help-block"></p>
                @if($errors->has('name'))
                <p class="help-block">
                    {{ $errors->first('name') }}
                </p>
                @endif
            </div>
        </div>
        {!! Form::submit(trans('global.app_update'), ['class' => 'btn btn-primary']) !!}
        {!! Form::close() !!}
    </div>
</div>
@stop
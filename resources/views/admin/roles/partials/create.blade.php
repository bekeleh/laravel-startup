@extends('layouts.app')
@section('content')
<h3 class="page-title">@lang('global.roles.title')</h3>
<div class="panel panel-default">
    {!! Form::open(['method' => 'POST', 'route' => ['admin.roles.store']]) !!}
    <div class="panel-heading">
        <a class="btn-sm btn-primary pull-right" href="{{ route('admin.roles.index') }}">
            <span class="glyphicon glyphicon-share-alt"></span>@lang('global.app_back')
        </a>
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-xs-12 form-group">
                {!! Form::label('name', 'Name*', ['class' => 'control-label']) !!}
                {!! Form::text('name', old('name'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                <p class="help-block"></p>
                @if($errors->has('name'))
                <p class="help-block">
                    {{ $errors->first('name') }}
                </p>
                @endif
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 form-group">
                {!! Form::label('permission', 'Permissions', ['class' => 'control-label']) !!}
                {!! Form::select('permission[]', $permissions, old('permission'), ['class' => 'form-control select2', 'multiple' => 'multiple']) !!}
                <p class="help-block"></p>
                @if($errors->has('permission'))
                <p class="help-block">
                    {{ $errors->first('permission') }}
                </p>
                @endif
            </div>
        </div>
        {!! Form::submit(trans('global.app_save'), ['class' => 'btn btn-primary']) !!}
        {!! Form::close() !!}
    </div>
</div>
@stop
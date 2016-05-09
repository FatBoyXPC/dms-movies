@extends('layouts.app')

@section('title')
    My Movie Lists
@endsection

@section('content')
<div class="container">
    <div class="panel panel-default">
        <div class="panel-heading">
            Add New List
        </div>
        <div class="panel-body">
            {{ Form::open(['url' => 'lists/add', 'method' => 'post', 'class' => 'form-horizontal']) }}
            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                    {{ Form::label('name', 'List Name', ['class'=> 'col-sm-2 control-label']) }}
                <div class="col-sm-6">
                    {{ Form::text('name', '', ['class' => 'form-control']) }}
                    @if ($errors->has('name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="col-sm-4">
                    <button type="submit" class="btn btn-primary">
                        <i class="fa fa-btn fa-list-alt"></i> Create List
                    </button>
                </div>
            </div>
            {{ Form::close() }}
        </div>
    </div>
</div>
@endsection

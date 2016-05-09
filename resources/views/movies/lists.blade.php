@extends('layouts.app')

@section('title')
    My Movie Lists
@endsection

@section('content')
<div class="container">
    <div class="panel panel-default">
        <div class="panel-heading">
            My Lists
            <div class="pull-right">
                <a href="{{ url('/lists/add') }}">Add New List</a>
            </div>
        </div>
        <div class="panel-body">
            This is a small app to let users create and save lists of movies. It's easy to get started!
            <a href="{{ url('/register') }}">Create an account</a> to get started and then
            <a href="{{ url('/search') }}">Search Movies</a> to find some movies!
        </div>
    </div>
</div>
@endsection

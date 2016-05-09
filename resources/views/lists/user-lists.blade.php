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
            @foreach ($movieLists as $movieList)
                <div class="list">
                    {{ $movieList->name }}:
                    <div class="movies">
                        @foreach ($movieList->movies as $movie)
                            <img src="{{ $movie->imageSrc }}" class="poster">
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection

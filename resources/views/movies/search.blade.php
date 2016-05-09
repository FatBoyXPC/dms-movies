@extends('layouts.app')

@section('title')
    Search Movies
@endsection

@section('content')
<div class="container">
    <div class="panel panel-default">
        <div class="panel-heading">Search Movies By:</div>
        <div class="panel-body">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active"><a href="#title" aria-controls="title" role="tab" data-toggle="tab">Title</a></li>
                <li role="presentation"><a href="#genre" aria-controls="genre" role="tab" data-toggle="tab">Genre</a></li>
                <li role="presentation"><a href="#person" aria-controls="person" role="tab" data-toggle="tab">Person</a></li>
            </ul>
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="title">
                    <form class="form-horizontal search-titles">
                        <div class="form-group">
                            <div class="col-sm-8">
                                <input type="text" class="form-control movie-title" placeholder="Search Movie Titles">
                            </div>
                            <div class="col-sm-4">
                                <button class="btn btn-primary">
                                    <i class="glyphicon glyphicon-search"></i>
                                    Search
                                </button>
                            </div>
                        </div>
                    </form>
                    <div class="title-results"></div>
                </div>
                <div role="tabpanel" class="tab-pane" id="genre">
                    <form class="form-horizontal search-genre">
                        <div class="form-group">
                            <div class="col-sm-4">
                                <select name="genre" class="form-control movie-genre">
                                    <option value="" class="empty-genre">Select a genre</option>
                                </select>
                            </div>
                            <div class="col-sm-8">
                                <button class="btn btn-primary">
                                    <i class="glyphicon glyphicon-search"></i>
                                    Search
                                </button>
                            </div>
                        </div>
                    </form>
                    <div class="genre-results"></div>
                </div>
                <div role="tabpanel" class="tab-pane" id="person">
                    <form class="form-horizontal search-people">
                        <div class="form-group">
                            <div class="col-sm-8">
                                <input type="text" class="form-control person" placeholder="Search For People">
                            </div>
                            <div class="col-sm-4">
                                <button class="btn btn-primary">
                                    <i class="glyphicon glyphicon-search"></i>
                                    Search
                                </button>
                            </div>
                        </div>
                    </form>
                    <div class="showing-results-for sr-only">
                        Showing Movies for: "<span class="person-name"></span>"
                    </div>
                    <div class="person-results"></div>
                    <div class="person-movie-results"></div>
                </div>
            </div>
            <div class="person-result-template sr-only">
                <a href="" class="person-link">
                    <img src="" class="poster">
                    <h4 class="name text-center"></h4>
                </a>
            </div>
            <div class="movie-result-template sr-only">
                <div class="row">
                    <div class="col-sm-2">
                        <img src="" class="poster">
                    </div>
                    <div class="col-sm-10">
                        <h2 class="title">asdf</h2>
                        <p>
                            Rating: <span class="rating"></span>
                        </p>
                        <p class="overview"></p>
                        <p>
                            Add this to your list:
                        </p>
                        @if (count($movieLists) > 0)
                            {{ Form::open(['url' => '/lists/add-movie', 'method' => 'post', 'class' => 'form-horizontal']) }}
                                <input type="hidden" name="mdb_id" class="mdb-id" value="">
                                <input type="hidden" name="title" class="title" value="">
                                <input type="hidden" name="rating" class="rating" value="">
                                <input type="hidden" name="overview" class="overview" value="">
                                <input type="hidden" name="image" class="image" value="">
                                <div class="form-group">
                                    <div class="col-sm-2">
                                        <select name="list" id="list" class="form-control">
                                            @foreach ($movieLists as $list)
                                                <option value="{{ $list->id }}">{{ $list->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-sm-10">
                                        <button type="submit" class="btn btn-primary"><i class="fa fa-btn fa-film"></i> Add Movie</button>
                                    </div>
                                </div>
                            {{ Form::close() }}
                        @else
                            <a href="/lists/add">Click here to create a list!</a>
                        @endif
                    </div>
                </div>
            </div>
            <p class="fat"></p>
        </div>
    </div>
</div>
@endsection

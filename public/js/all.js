$(function() {
    var apiKey = '16a4529960d0405a0f0a5e4a07c0ca70';
    var baseUri = 'http://api.themoviedb.org/3/';
    var baseImageUri = 'http://image.tmdb.org/t/p/w154';
    var configUri = 'configuration';
    var movieGenreList = 'genre/movie/list';
    var genreMovies = 'genre/_id_/movies';
    var movieSearch = 'search/movie';
    var peopleSearch = 'search/person';
    var personMovies = 'person/_id_/movie_credits';

    var queryParams = {
        api_key: apiKey,
    };

    $.get(baseUri + configUri, queryParams, function(data) {
        config = data;
    });

    var movieGenres = $.get(baseUri + movieGenreList, queryParams, function(data) {
        genres = data.genres;
        var $movieGenreOption = $('.empty-genre');

        $.each(genres, function(index, genre) {
            $movieGenreOption.clone()
                             .val(genre.id)
                             .text(genre.name)
                             .appendTo('.movie-genre');
        });
    });
    
    $('form.search-titles').on('submit', function(e) {
        e.preventDefault();
        var $titleResults = $('.title-results');

        $titleResults.html('');

        queryParams.query = $('.movie-title').val();

        var movies = $.get(baseUri + movieSearch, queryParams, function(data) {
            generateMovieResults(data.results, '.title-results');
        });
    });

    $('form.search-genre').on('submit', function(e) {
        e.preventDefault();
        var $genreResults = $('.genre-results');
        var genreId = $('.movie-genre').val();

        $genreResults.html('');

        queryParams.query = genreId;

        var movies = $.get(baseUri + replaceUrlId(genreMovies, genreId), queryParams, function(data) {
            generateMovieResults(data.results, '.genre-results');
        });
    });

    $('form.search-people').on('submit', function(e) {
        e.preventDefault();

        $('.person-results').html('');

        queryParams.query = $('input.person').val();

        var movies = $.get(baseUri + peopleSearch, queryParams, function(data) {
            $.each(data.results, function(index, value) {
                var $newResult = $('.person-result-template').clone();
                var imageSrc = baseImageUri + value.profile_path;

                $('.person-link', $newResult).attr('href', value.id).data('name', value.name);
                $('img.poster', $newResult).attr('src', imageSrc);
                $('h4.name', $newResult).text(value.name);

                $newResult.removeClass('person-result-template sr-only')
                          .addClass('person-result')
                          .appendTo('.person-results');
            });

            $('.person-link').click(function(e) {
                e.preventDefault();

                var personId = $(this).attr('href');
                var personName = $(this).data('name');

                $('.showing-results-for').removeClass('sr-only')
                $('.showing-results-for span').text(personName);

                delete queryParams.query;

                var movies = $.get(baseUri + replaceUrlId(personMovies, personId), queryParams, function(data) {
                    $('.person-results').addClass('sr-only');
                    generateMovieResults(data.cast, '.person-movie-results');
                });
            });
        });
    });

    function replaceUrlId(url, id) {
        return url.replace('_id_', id);
    }

    function generateMovieResults(movies, appendTo) {
        $.each(movies, function(index, value) {
            var $newResult = $('.movie-result-template').clone();
            var imageSrc = baseImageUri + value.poster_path;

            $('input.mdb-id', $newResult).val(value.id);
            $('input.title', $newResult).val(value.title);
            $('input.rating', $newResult).val(value.vote_average);
            $('input.overview', $newResult).val(value.overview);
            $('input.image', $newResult).val(value.poster_path);

            $('img.poster', $newResult).attr('src', imageSrc);
            $('h2.title', $newResult).text(value.title);
            $('p.rating', $newResult).text(value.vote_average);
            $('p.overview', $newResult).text(value.overview);

            $newResult.removeClass('movie-result-template sr-only')
                      .addClass('movie-result')
                      .appendTo(appendTo);
        });
    }
});
//# sourceMappingURL=all.js.map

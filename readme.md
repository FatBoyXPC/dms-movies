# DMS Movies

This was really just a project as a 'challenge' from a recent interview I had.
However, a friend had expressed interest in how to run this, as he uses a similar
thing to track his books ([Goodreads](https://www.goodreads.com/)).
Since it looks like some people might have a use for it, here are some
instructions to run this locally.

1. Download and install php5-cli at minimum. You could also run this off apache
or nginx, but these instructions won't cover that.
2. Install [Composer](https://getcomposer.org/download/).
3. Clone this repo
4. Go into the cloned repo directory and run the following commands:
````
composer install
php artisan migrate
php artisan serve
````
You may also run the serve command with the host and/or ports options to specify
an IP address and port to run it on:

`php artisan serve --host=127.0.0.1 --port=8080`

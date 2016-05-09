<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Validator;
use App\Http\Requests;
use App\Models\Movie;
use App\Models\MovieList;

class ListsController extends Controller
{
    public function processAddList(Request $request)
    {

        $validator = $this->validator($request->all());

        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }

        $list = new MovieList(['name' => $request->input('name')]);
        
        if (Auth::user()->movieLists()->save($list)) {
            return redirect('/lists');
        } else {
            return redirect()->back()->withErrors([
                'did_not_save' => 'This Movie List did not save. Please try again.',
            ]);
        }
    }
    public function showAddList()
    {
        return view('lists.add-list-form');
    }
    
    public function userLists()
    {
        $data = [
            'movieLists' => Auth::user()->movieLists,
        ];
        return view('lists.user-lists', $data);
    }

    public function addMovieToList(Request $request)
    {
        $movie = Movie::where(['mdb_id' => $request->get('mdb_id')])->first();

        if (!$movie) {
            $movie = Movie::create([
                'mdb_id' => $request->get('mdb_id'),
                'title' => $request->get('title'),
                'rating' => $request->get('rating'),
                'overview' => $request->get('overview'),
                'image' => $request->get('image'),
            ]);
        }
        // return $movie;
        $movieList = MovieList::find($request->get('list'));
        $movieList->movies()->attach($movie->id);

        return redirect('/lists');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
        ]);
    }
}

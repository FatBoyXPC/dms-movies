<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Http\Requests;

class MoviesController extends Controller
{
    public function search()
    {
        $data = [
            'movieLists' => Auth::user()->movieLists,
        ];
        return view('movies.search', $data);
    }
}

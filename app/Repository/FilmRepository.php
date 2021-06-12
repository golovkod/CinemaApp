<?php

namespace App\Repository;

use App\Models\Film;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use willvincent\Rateable\Rating;

class FilmRepository
{


    public function index()
    {
        return Film::with('images')->sortable()->paginate(8);
    }

    /**
     * @return Film
     */
    public function single(): Film
    {
        return new Film();
    }

    /**
     * @param Request $request
     * @param $filmId
     * @return \Illuminate\Http\RedirectResponse
     */
    public function rating(Request $request, $filmId): RedirectResponse
    {
        $info = Film::find($filmId);
        $rating = $info->ratings()->where('user_id', auth()->user()->id)->first();
        if (is_null($rating)) {
            $rating = new Rating();
            $rating->rating =  $request['rate'];
            $rating->user_id = auth()->user()->id;
            $info->ratings()->save($rating);
            return redirect()->back();
        } else {
            return redirect()->back()->with('success', 'Вы уже проголосовали! Дважды - нельзя.');
        }
    }
}

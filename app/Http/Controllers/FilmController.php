<?php

namespace App\Http\Controllers;

use App\Repository\FilmRepository;
use App\Repository\SearchFiltersRepository;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class FilmController extends Controller
{


    /**
     * @param Request $req
     * @return View
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function index(Request $req): View
    {
        return view(
            'review',
            [
                'info' => app()->make(FilmRepository::class)->index(),
                'selectedId' => app()->make(SearchFiltersRepository::class)->getSelectedId($req)
            ]
        );
    }

    /**
     * @param Request $req
     * @return View
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function filters(Request $req)
    {
        return view(
            'review',
            [
                'info' => app()->make(SearchFiltersRepository::class)->filter($req),
                'selectedId' => app()->make(SearchFiltersRepository::class)->getSelectedId($req)
            ]
        );
    }

    /**
     * @param Request $req
     * @return View
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function searchFilter(Request $req)
    {
        return view(
            'review',
            [
                'info' => app()->make(SearchFiltersRepository::class)->searchFilter($req),
                'selectedId' => app()->make(SearchFiltersRepository::class)->getSelectedId($req)
            ]
        );
    }

    /**
     * @param Request $req
     * @return View
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function searchName(Request $req)
    {
        return view(
            'review',
            [
                'info' => app()->make(SearchFiltersRepository::class)->searchName($req),
                'selectedId' => app()->make(SearchFiltersRepository::class)->getSelectedId($req)
            ]
        );
    }


    /**
     * @param $filmId
     * @return View
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function single($filmId)
    {
        return view(
            'single',
            [
                'info' => app()->make(FilmRepository::class)->single()->find($filmId)
            ]
        );
    }

    /**
     * @param Request $request
     * @param $filmId
     * @return mixed
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function rating(Request $request, $filmId)
    {
        return app()->make(FilmRepository::class)->rating($request, $filmId);
    }
}

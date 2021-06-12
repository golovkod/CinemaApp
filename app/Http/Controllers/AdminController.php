<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRequest;
use App\Http\Requests\UpdateRequest;
use App\Repository\AdminRepository;
use App\Models\Actor;
use App\Models\Film;
use App\Models\Generes;
use App\Models\Image;
use App\Traits\ImageUpload;
use Illuminate\Routing\Redirector;
use Illuminate\View\View;

class AdminController extends Controller
{
    use ImageUpload;

    /**
     * @return View
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function index()
    {
        return view(
            'info.index',
            [
                'info' => app()->make(Film::class)->with('actors', 'generes')->paginate(8)
            ]
        );
    }


    /**
     * @return View
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function create()
    {
        return view(
            'info.create',
            [
                'a_name' => app()->make(Actor::class)->all(),
                'g_name' => app()->make(Generes::class)->all()
            ]
        );
    }


    /**
     * @param StoreRequest $request
     * @return Redirector
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function store(StoreRequest $request)
    {
        app()->make(AdminRepository::class)->store($request);
        return redirect('/info')->with('success', 'info saved!');
    }


    /**
     * @param $filmId
     * @return View
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function edit($filmId)
    {
        return view(
            'info.edit',
            [
                'info' => app()->make(Film::class)->with('actors', 'generes')->find($filmId),
                'a_name' => app()->make(Actor::class)->all(),
                'g_name' => app()->make(Generes::class)->all()
            ]
        );
    }

    /**
     * @param UpdateRequest $request
     * @param Film $info
     * @param Image $data
     * @return Redirector
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function update(UpdateRequest $request, Film $info, Image $data)
    {
        app()->make(AdminRepository::class)->update($request, $info, $data);
        return redirect('/info')->with('success', 'info updated!');
    }


    /**
     * @param $filmId
     * @return Redirector
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function destroy($filmId)
    {
        app()->make(AdminRepository::class)->destroy($filmId);
        return redirect('/info')->with('success', 'info deleted!');
    }

    /**
     * @return View
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function chart()
    {
        return view('charts')
            ->with(
                'user',
                json_encode(app()->make(AdminRepository::class)->chart($year = [2018, 2019, 2020]), JSON_NUMERIC_CHECK)
            )
            ->with(
                'year',
                json_encode($year, JSON_NUMERIC_CHECK)
            );
    }
}

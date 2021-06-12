<?php

namespace App\Http\Controllers;

use App\Repository\ActorsRepository;
use Illuminate\View\View;

class ActorController extends Controller
{
    /**
     * @param $actorId
     * @return View
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function actorsOne($actorId): View
    {
        return view(
            'actors',
            [
                'info' => app()->make(ActorsRepository::class)->actorsOne()->find($actorId)
            ]
        );
    }
}

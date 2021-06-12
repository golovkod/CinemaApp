<?php

namespace App\Repository;

use App\Models\Actor;

class ActorsRepository
{
    /**
     * @return Actor
     */
    public function actorsOne(): Actor
    {
        return new Actor();
    }
}

<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use tizis\laraComments\Traits\Commenter;

class User extends Authenticatable
{
    use Commenter;
    use Notifiable;
    use HasFactory;

    public $timestamps = false;
    protected $fillable = [
        'name',
        'email',
        'password'
    ];

    public function messages()
    {
        return $this->hasMany(Chat::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Generes extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $primaryKey = 'g_id';
    protected $fillable = [
        'g_name'
    ];

    public function film()
    {
        return $this->belongsToMany(Film::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Actor extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $primaryKey = 'a_id';
    protected $fillable = [
        'a_name'
    ];

    public function film()
    {
        return $this->belongsToMany(Film::class);
    }
}

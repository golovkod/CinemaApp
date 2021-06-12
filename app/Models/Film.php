<?php

namespace App\Models;

use Kyslik\ColumnSortable\Sortable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use tizis\laraComments\Contracts\ICommentable;
use tizis\laraComments\Traits\Commentable;
use willvincent\Rateable\Rateable;

class Film extends Model implements ICommentable
{
    use Commentable;
    use Sortable;
    use Rateable;
    use HasFactory;

    protected $table = 'films_models';
    public $sortable = ['f_id','f_name','f_date', 'f_summa'];
    public $timestamps = false;
    protected $primaryKey = 'f_id';
    protected $fillable = [
        'f_name',
        'f_country',
        'f_res',
        'f_summa',
        'f_year',
        'f_date',
    ];

    public function images()
    {
        return $this->hasOne(Image::class);
    }

    public function actors()
    {
        return $this->belongsToMany(Actor::class);
    }

    public function generes()
    {
        return $this->belongsToMany(Generes::class);
    }


}

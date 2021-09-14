<?php

namespace App\Models;

use App\Traits\AddEdit;
use App\Traits\Scopes;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use AddEdit;
    use Scopes;
    use Sluggable;

    public function sluggable():array
    {
        return [
            'slug' => [
                'source' => 'title_ru'
            ]
        ];
    }

    protected $table = 'cities';

    protected $fillable = [
        'isActive','index','slug','country_id',
        'title_ru','title_kz','title_en',
    ];

    public function country()
    {
        return $this->belongsTo(Country::class);
    }
}

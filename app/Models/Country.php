<?php

namespace App\Models;

use App\Traits\AddEdit;
use App\Traits\Scopes;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
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

    protected $table = 'countries';

    protected $fillable = [
        'isActive','index','slug',
        'title_ru','title_kz','title_en',
    ];

    public function city()
    {
        return $this->hasMany(City::class);
    }

}

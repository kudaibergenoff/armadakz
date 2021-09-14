<?php

namespace App\Models;

use App\Traits\AddEdit;
use App\Traits\IsBoolean;
use App\Traits\Scopes;
use App\Traits\UploadFile;
use App\Traits\UploadImage;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class News extends Model
{
    use HasFactory;
    use AddEdit, Scopes, UploadImage, IsBoolean;
    use Sluggable;

    public function sluggable():array
    {
        $slug = $this->is_slug == true ? $this->slug : 'title' ;
        return [ 'slug' => ['source' => $slug] ];
    }

    protected $table = 'news';

    protected $fillable = [
        'isActive','type_id','status_id',
        'user_id','store_id',
        'title','slug',
        'description','text','url',
        'images'
    ];

    protected $casts = [
        'images' => 'array',
    ];

    public function items()
    {
        return $this->belongsToMany(Item::class);
    }

    public function comments()
    {
        return $this->hasMany(News::class);
    }

    public function status()
    {
        return $this->belongsTo(NewStatus::class,'status_id','id');
    }

    public function type()
    {
        return $this->belongsTo(NewType::class,'type_id','id');
    }

    public function store()
    {
        return $this->belongsTo(Store::class);
    }

    //
    public function setItem($ids)
    {
//        if($ids == null) { return; }

        $this->items()->sync($ids);
    }

    public function videoImage()
    {
        $video = Str::between($this->url,'?v=','&');
        $videoImage = $video != null ? 'https://img.youtube.com/vi/' . $video . '/0.jpg' : null;

        return $videoImage;
    }
}

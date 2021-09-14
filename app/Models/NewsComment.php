<?php

namespace App\Models;

use App\Traits\AddEdit;
use App\Traits\Scopes;
use App\Traits\UploadImage;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewsComment extends Model
{
    use HasFactory;
    use AddEdit;
    use Scopes;
    use UploadImage;

    protected $table = 'news_comments';

    protected $fillable = [
        'status_id',
        'news_id','user_id',
        'rating','name','email','text'
    ];

    public function news()
    {
        return $this->belongsTo(News::class)->withDefault(['slug'=>'нет данных']);
    }

    public function status()
    {
        return $this->belongsTo(ReviewStatus::class,'status_id','id');
    }
}

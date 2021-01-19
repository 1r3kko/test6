<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BlogPost extends Model
{
    use SoftDeletes;

    protected $fillable=
        [
            'title',
            'slug',
            'category_id',
            'excerpt',
            'content_raw',
            'is_published',
            'published_at',
        ];

    public function category()
    {
        return $this->belongsTo(BlogCategory::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}

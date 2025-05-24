<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Blog extends Model
{
    use HasFactory;
    
    protected $table = "blogs";

    const ID = "id";
    const IMAGE = "image";
    const TITLE = "title";
    const CONTENT = "content";
    const SHORT_CONTENT = "short_content";
    
    const META_TITLE = "meta_title";
    const META_KEYWORD = "meta_keyword";
    const META_DESCRIPTION = "meta_description";

    Const IMAGE2="image2";
    Const IMAGE3="image3";
    const BLOG_DATE = "blog_date";
    const BLOG_CATEGORY = "blog_category";
    const BLOG_STATUS = "blog_status";
    const BLOG_SORTING = "blog_sorting";
    const STATUS = "status";
    const CREATED_BY = "created_by";
    const UPDATED_BY = "updated_by";
    const CREATED_AT = "created_at";
    const UPDATED_AT = "updated_at";

    const BLOG_STATUS_LIVE = "live";
    const BLOG_STATUS_DISABLED = "disabled";
    #"live","disabled"

    protected static function boot() {
        parent::boot();
        static::creating(function ($blog) {
            $blog->slug = Str::slug($blog->title, '-');
        });
    }
}

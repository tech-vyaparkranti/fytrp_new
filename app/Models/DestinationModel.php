<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DestinationModel extends Model
{
    use HasFactory;

    protected $table = "our_destinations";

    const ID = "id";
    const DESTINATION = "destination";
    const DESTINATION_DETAILS = "destination_details";
    const DESTINATION_IMAGE = "destination_image";
    const POSITION = "position";
    const STATUS = "status";
    const META_TITLE = "meta_title";
    const META_DESCRIPTION = "meta_description";
    const META_KEYWORDS = "meta_keywords";
    const CREATED_BY = "created_by";
    const UPDATED_BY = "updated_by";
    const CREATED_AT = "created_at";
    const UPDATED_AT = "updated_at";
    protected static function boot()
    {
        parent::boot();
    
        static::saving(function ($model) {
            // If slug is empty and package_name is available, generate slug
            if (empty($model->slug) && !empty($model->package_name)) {
                $model->slug = Str::slug($model->package_name, '-');
            }
    
            // If destination_slug is empty and package_country is available, generate destination_slug
            if (empty($model->destination_slug) && !empty($model->destination)) {
                $model->destination_slug = Str::slug($model->destination, '-');
            }
        });
    }
}

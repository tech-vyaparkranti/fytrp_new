<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BookHotel extends Model
{
    //
    use HasFactory;
    protected $table = 'book_hotels';

    protected $fillable = [

    ];
    const TABLE_NAME = "book_hotels";
    const ID = "id";
    const HOTEL_NAME = "hotel_name";
    const HOTEL_IMAGE = "hotel_image";
    const DESCRIPTION = "description";
    const STATUS = "status";
    const CREATED_BY = "created_by";
    const UPDATED_BY = "updated_by";
    const CREATED_AT = "created_at";
    const UPDATED_AT = "updated_at";
    const META_KEYWORD = "meta_keyword";
    const META_TITLE = "meta_title";
    const META_DESCRIPTION = "meta_description";
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TestimonialModel extends Model
{
    use HasFactory;

    protected $table = "testimonials";

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        self::IMAGE,
        self::HEADING_TOP,
        self::HEADING_MIDDLE,
        self::HEADING_BOTTOM, // <-- THIS IS YOUR "NAME" FIELD
        self::TESTIMONIAL_CITY,
        self::SLIDE_STATUS,
        self::SLIDE_SORTING,

        self::CREATED_BY,
        self::UPDATED_BY,
    ];

    /**
     * The model's default values for attributes.
     *
     * @var array
     */
    protected $attributes = [
        self::SLIDE_STATUS => self::SLIDE_STATUS_LIVE,
        self::SLIDE_SORTING => 0,
    ];


    // Define constants for your column names for better readability and refactoring
    const ID = "id";
    const IMAGE = "image";
    const HEADING_TOP = "heading_top";
    const HEADING_MIDDLE = "heading_middle";
    const HEADING_BOTTOM = "heading_bottom"; // <-- THIS IS THE CONSTANT FOR YOUR "NAME" FIELD
    const TESTIMONIAL_CITY = "testimonial_city";
    const SLIDE_STATUS = "slide_status";
    const SLIDE_SORTING = "slide_sorting";

    const STATUS = "status";
    const CREATED_BY = "created_by";
    const UPDATED_BY = "updated_by";
    const CREATED_AT = "created_at";
    const UPDATED_AT = "updated_at";

    const SLIDE_STATUS_LIVE = "live";
    const SLIDE_STATUS_DISABLED = "disabled";

    // ... (rest of your model code)
}
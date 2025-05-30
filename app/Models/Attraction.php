<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attraction extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'image', 'short_description', 'status', 'sorting'
    ];

    const ID = 'id';
    const IMAGE = 'image';
    const TITLE = 'title';
    const SHORT_DESCRIPTION = 'short_description';
    const STATUS = 'status';
    const SORTING = 'sorting';
}
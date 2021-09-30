<?php

namespace App\Models\Book;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'sub_title',
        'author',
        'co_author',
        'keywords',
        'description',
        'cat_id',
        'feature',
        'cover',
        'file',
        'asin',
        'price',
    ];
}

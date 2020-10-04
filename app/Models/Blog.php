<?php

namespace App\Models;

use App\QueryFilters\Sort;
use App\QueryFilters\Active;
use App\QueryFilters\MaxCount;
use Illuminate\Pipeline\Pipeline;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Blog extends Model
{
    use HasFactory;

    public static function allBlogPost()
    {
        return $blogs = app(Pipeline::class)
            ->send(Blog::query())
            ->through([
                Active::class,
                Sort::class,
                MaxCount::class,
            ])->thenReturn()
            ->paginate(5);
    }
}

<?php

namespace App\Http\Filters;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;

class PostFilter extends AbstractFilter
{
    /**
     * Create a new class instance.
     */

    protected array $keys = [
        'profile_id',
        'category_id',
        'category_title',
        'title',
        'content',
        'published_at_from',
        'published_at_to',
        'views_from',
        'views_to'
    ];


    


    protected function profileId(Builder $builder, $value)
    {
        $builder->where('profile_id', $value);
    }
    protected function categoryId(Builder $builder, $value)
    {
        $builder->where('category_id', $value);
    }
    protected function categoryTitle(Builder $builder, $value)
    {
        $builder->whereHas('category', function (Builder $builder) use ($value) {
            $builder->where('title', 'ilike', "%$value%");
        });
    }
    protected function title(Builder $builder, $value)
    {
        $builder->where('title', 'ilike', "%$value%");
    }
    protected function content(Builder $builder, $value)
    {
        $builder->where('content', 'ilike', "%$value%");
    }

    protected function publishedAtFrom(Builder $builder, $value)
    {
        $builder->where('published_at', ">=", $value);
    }
    protected function publishedAtTo(Builder $builder, $value)
    {
        $builder->where('published_at', '<=', $value);
    }
    protected function viewsFrom(Builder $builder, $value)
    {
        $builder->where('views', ">=", $value);
    }
    protected function viewsTo(Builder $builder, $value)
    {
        $builder->where('views', "<=", $value);
    }


}




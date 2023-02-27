<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Str;

class Posts extends Model
{
    use HasFactory, Sluggable;

    protected $fillable = [
        'image',
        'slug',
        'title',
        'content',
        'created_by',
        'post_id',
        'tag_id',
        'is_pinned',
    ];



    public function tag(): BelongsToMany
    {
        return $this->belongsToMany(Tags::class, 'post_tag', 'post_id', 'tag_id');
    }



    public function category(): BelongsToMany
    {
        return $this->belongsToMany(Categories::class, 'post_category', 'post_id', 'category_id');
    }


    public function tags()
    {
        return $this->belongsToMany(Tags::class, 'post_tag','post_id','tag_id');
    }

    //    Slug
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    // Update slug
     protected static function booted()
    {
        static::updating(function ($model) {

            if ($model->isDirty('title')) {
                $model->slug = Str::slug($model->title);
            }


        });
    }

    public function scopeFilter($query, array $filters)
    {
        $query->when(isset($filters['category']), function ($query) use ($filters) {
            $query->whereHas('category', function ($query) use ($filters) {
                $query->where('name', $filters['category']);
            });
        });

        $query->when(isset($filters['tag']), function ($query) use ($filters) {
            $query->whereHas('tag', function ($query) use ($filters) {
                $query->where('name', $filters['tag']);
            });
        });
    }



}

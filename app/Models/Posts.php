<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Posts extends Model
{
    use HasFactory;

    protected $fillable = [
        'image',
        'title',
        'content',
        'created_by',
        'post_id',
        'tag_id',
    ];


    public function tag(): BelongsToMany
    {
        return $this->belongsToMany(Tags::class,'post_tag','post_id','tag_id');
    }


    
   public function category(): BelongsToMany
   {
       return $this->belongsToMany(Categories::class,'post_category','post_id','category_id');
   }

    public $timestamps = false;
}

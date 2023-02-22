<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Post_Category extends Model
{
    use HasFactory;

    protected $table = 'post_category';

    protected $fillable = [
        'post_id',
        'category_id',
    ];

    // /**
    //  * The roles that belong to the Post_Category
    //  *
    //  * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
    //  */
    // public function posts(): BelongsToMany
    // {
    //     return $this->belongsToMany(Posts::class);
    // }


}

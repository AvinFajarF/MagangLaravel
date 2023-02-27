<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Tags extends Model
{
    use HasFactory;

    protected $table = 'tags';


    protected $fillable =
    [
        'name',
        'description',
        'created_by',
    ];

    public function tag(): BelongsToMany
    {
        return $this->belongsToMany(Posts::class);
    }


    public function posts()
    {
        return $this->belongsToMany(Posts::class);
    }


}

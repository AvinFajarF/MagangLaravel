<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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

    protected $attributes = [
        'description' => null,
    ];


}

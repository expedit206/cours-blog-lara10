<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;

    protected $width=['category'];

    public function getRouteKeyName(): string
    {
        return 'slug'; 
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}

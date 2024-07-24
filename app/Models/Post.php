<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use PhpParser\Builder\Function_;

class Post extends Model
{
    use HasFactory;

    protected $width=[
    
    'category', 
    
    'tags'
];

    public function getRouteKeyName(): string
    {
        return 'slug'; 
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
    public Function tags() : BelongsToMany
    {
        return $this-> belongsToMany(Tag::class);
    }
}

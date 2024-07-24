<?php

namespace App\Models;

use App\Models\Post;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Tag extends Model
{
    use HasFactory;

    public function getRouteKeyName(): string
    {
        return 'slug'; 
    }


    
    public Function tags() : BelongsToMany
    {
        return $this-> belongsToMany(Post::class);
    }

}

<?php

namespace App\Models;

use PhpParser\Builder\Function_;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Post extends Model
{
    use HasFactory;

    protected $guarded =['id', 'created_at', 'updated_at'];
    protected $width=[
    
    'category', 
    
    'tags'
];

    public function getRouteKeyName(): string
    {
        return 'slug'; 
    }

    public function scopeFilters(Builder $query, array $filters): void
    {
        if(isset($filters['search']))
        {
            $query ->where(fn (Builder $query)=>$query
            
            ->where('title', 'LIKE', '%' .$filters['search'] .'%')
            ->orWhere('content', 'LIKE', '%' .$filters['search'] .'%')
            );
         }

        
         if(isset($filters['category'])){

           $query -> where(

                'category_id', $filters['category']->id ?? $filters['category']
    
           );
                
         }


         if(isset($filters['tag'])){

           $query -> whereRelation(

            'tags', 'tags.id', $filters['tag']->id ?? $filters['tag']
           
            );
            
         }


    }   

    public function exists(): bool{
        return (bool) $this->id;        
    }

    public function category(): BelongsTo
        {
            return $this->belongsTo(Category::class);
        }

    public Function tags() : BelongsToMany
        {
            return $this-> belongsToMany(Tag::class);
        }

    public Function comments() : HasMany
        {
            return $this-> hasMany(Comment::class)->latest();
        }

}

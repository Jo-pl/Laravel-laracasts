<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory; //Post::factory()

    protected $fillable = ['title','excerpt','body'];

    protected $with = ['category','author'];

    //Another way of defining the key with which laravel searches the item in the database
    /*public function getRouteKeyName()
    {
        return 'slug';
    }
    */

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /*
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    */

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function scopeFilter($query, array $filters)
    {
        //First way
        // if(isset($filters['search'])){
        //     $query->where('title','like','%' . request('search') . '%')
        //     ->orWhere('excerpt','like','%' . request('search') . '%');
        // }

        $query->when($filters['search'] ?? false, fn($query, $search)=>
        $query->where(fn($query)=>
            $query->where('title','like','%' . $search . '%')
            ->orWhere('excerpt','like','%' . $search . '%')
        ));

        $query->when($filters['category'] ?? false, fn($query, $category)=>
            $query->whereHas('category', fn($query)=>
                $query->where('slug',$category)
        ));

        $query->when($filters['author'] ?? false, fn($query, $author)=>
            $query->whereHas('author', fn($query)=>
                $query->where('username',$author)
        ));
    }

}

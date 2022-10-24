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
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    // Laravel protects the model fields from mass assignment by default. 
    // To enable mass assignment, we will need to define the $fillable property 
    // in the model. 

    // $hidden will hide model fields when we convert the model into an array, and 
    // $append will add extra fields to the array. 

    protected $fillable = [
        'title',
        'body'
    ];

    protected $guarded = [];

    protected $hidden = [
        'title',
    ];

    protected $appends = [
        'title_upper_case'
    ];

    protected $casts = [
        'body' => 'array',
    ];

    // Accessor
    public function getTitleUpperCaseAttribute()
    {
        return strtoupper($this->title);
        // php artisan tinker
        // >>> \App\Models\Post::find(1)->TitleUpperCase
        // => "UNTITLED"
        // >>> \App\Models\Post::find(1)->title_upper_case
        // => "UNTITLED"
    }

    // Mutator
    public function setTitleAttribute($title)
    {
        $this->attributes['title'] = strtolower($title);
        // php artisan tinker
        // >>> $post = \App\Models\Post::find(1)
        // >>> $post->title = 'HeLLo'
        // => "HeLLo"
        // >>> $post->title
        // => "hello"
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'post_id');
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'post_user', 'post_id', 'user_id');
    }
}

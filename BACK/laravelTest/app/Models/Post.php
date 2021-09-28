<?php

namespace App\Models;

use App\Models\Tag;
use App\Models\Image;
use App\Models\Artist;
use App\Models\Comment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['title','content'];

    // public function comments()
    // {
    //     return $this->hasMany(Comment::class);
    // }

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }
    
    public function latestComment()
    {
        return $this->morphOne(Comment::class,'commentable')->latestOfMany();
    }
    
    public function image()
    {
        return $this->hasOne(Image::class);
    }
    public function imageArtist()
    {
        return $this->hasOneThrough(Artist::class, Image::class);
    }
    public function tags()
    {
        return $this->belongsToMany(Tag::class,'post_tags');
    }
}

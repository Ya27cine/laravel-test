<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = ["Title", "Content", "Active", "Slug"];


    public function comments() : HasMany{
        return $this->hasMany(Comment::class);
    }

    protected static function boot()
    {
        parent::boot();

        self::deleting( function(Post $post){

            $post->comments()->delete();

        });
    }
}

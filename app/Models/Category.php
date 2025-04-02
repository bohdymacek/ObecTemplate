<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'slug', 'user_id'];

    // One to many
    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    // One to many vztah -> Users má více kategorii
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // 
    public function publishedPosts()
    {
        return SELF::posts()->with(['user:id,name', 'category'])->published()->latest('created_at')->paginate(10);
    }
}

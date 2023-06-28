<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $table = "posts";
    protected $fillable = [
        'title', 'slug', 'thumbnail', 'category_id', 'description', 'content', 'user_id', 'status'
    ];

    public function User()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}

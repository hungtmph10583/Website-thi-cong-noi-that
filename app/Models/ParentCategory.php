<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParentCategory extends Model
{
    use HasFactory;
    protected $table = "parent_category";
    protected $fillable = [
        'name', 'image', 'slug'
    ];
    // Quan hệ parent -> category
    public function categories()
    {
        return $this->hasMany(Category::class, 'parent_id');
        // quan he 
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table = "categories";
    protected $fillable = [
        'name', 'parent_id', 'slug', 'image', 'status', 'description'
    ];
    // Quan hệ category -> product
    public function products()
    {
        return $this->hasMany(Product::class, 'category_id');
        // quan he 
    }
    // Quan hệ category -> parent
    public function parent_category()
    {
        return $this->belongsTo(ParentCategory::class, 'parent_id');
    }
}

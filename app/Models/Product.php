<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $fillable = [
        'name',
        'category_id',
        'material_id',
        'slug',
        'image',
        'weight',
        'height',
        'length',
        'status',
        'description'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
    public function material()
    {
        return $this->belongsTo(Material::class, 'material_id');
    }
    public function galleries(){
        return $this->hasMany(ProductGallery::class, 'product_id');
    }
}

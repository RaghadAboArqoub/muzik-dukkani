<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_name',
        'description',
        'image',
        'status',
        'category_id'
    ];
    public function categories()
    {
        return $this->belongsToMany(Category::class, 'category_product');
    }
}

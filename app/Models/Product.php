<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $primaryKey = 'article';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'article',
        'name',
        'description',
        'price',
        'image',
        'category_id'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class, 'product_article', 'article');
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class, 'product_article', 'article');
    }
}
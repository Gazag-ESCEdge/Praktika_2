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
        'brand',
        'description',
        'complect',
        'character',
        'price',
        'image1',
        'image2',
        'image3',
        'image4',
        'image5',
        'image6',
        'image7',
        'image8',
        'image9',
        'image10',
        'image11',
        'image12',
        'image13',
        'image14',
        'image15',
        'category_id',
        'for_order',
        'reviews_num',
        'hit',
        'sale',
        'rating',
        'empty'
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
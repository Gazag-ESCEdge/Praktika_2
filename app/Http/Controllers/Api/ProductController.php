<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        return Product::with('category')->get();
    }

    public function show($article)
    {
        return Product::with('reviews')->findOrFail($article);
    }
}

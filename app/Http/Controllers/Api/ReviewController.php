<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Review;

class ReviewController extends Controller
{
    public function store(Request $request)
    {
        return Review::create($request->all());
    }

    public function productReviews($article)
    {
        return Review::where('product_article', $article)->get();
    }
}

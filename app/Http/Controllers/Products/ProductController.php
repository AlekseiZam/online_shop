<?php

namespace App\Http\Controllers\Products;

use App\Http\Controllers\Controller;
use App\Http\Filters\VideocardFilter;
use App\Http\Requests\products\VideocardRequest;
use App\Models\Brand;
use App\Models\BrandCategory;
use App\Models\Category;
use App\Models\Good;

class ProductController extends Controller
{
    public function  videocard(VideocardRequest $request)
    {
        $data = $request->validated();
        $filter = app()->make(VideocardFilter::class, ['queryParams' =>array_filter($data)]);
        $products = Good::where('category_id', 1)->filter($filter)->paginate(10);
        $brands = Category::find(1)->brands;
        $manufacturers = Category::find(1)->manufacturers;

        return view('products.videocards', compact('products', 'brands', 'manufacturers'));
    }
}

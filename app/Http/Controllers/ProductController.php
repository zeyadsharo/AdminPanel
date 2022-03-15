<?php

namespace App\Http\Controllers;

use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        try {
            $products = Product::with(array('attributes' => function ($query) {
                $query->leftJoin('attribute_type_lookups', 'attribute_type_lookups.id', 'attribute_type_id');
            }))->get();
            return response([
                "status" => "success",
                'products' => $products,
            ], 200);
        } catch (\Exception $exception) {
            \Log::error($exception->getMessage());
            return response([
                "status" => "error",
                'products' => [],
            ], 403);
        }

    }
}

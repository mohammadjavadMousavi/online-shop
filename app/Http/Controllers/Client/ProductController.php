<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
class ProductController extends Controller
{
    public function show(Product $product)
    {

        return view('client.product.show',[
            'product' => $product,
        ]);
    }    
}

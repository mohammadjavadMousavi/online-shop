<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Comment;

class CommentController extends Controller
{

    public function __construct(\)
    {
        $this->middleware('auth');
    }

    public function store(Request $request , Product $product)
    {

        $this->validate($request ,[
            'content' => ['required'],
        ]);

        Comment::query()->create([
            'user_id' => auth()->id(),
            'product_id' => $product->id,
            'content' => $request->get('content')
        ]);

        return redirect()->back();
    }
}

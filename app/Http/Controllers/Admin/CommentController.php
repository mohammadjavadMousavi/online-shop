<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Comment;
class CommentController extends Controller
{
    public function index(Product $product)
    {
        return view('admin.productComments.index',[
            'product' => $product
        ]);
    }

    public function destroy(Comment $comment)
    {
        $comment->delete();

        return back();
    }
}

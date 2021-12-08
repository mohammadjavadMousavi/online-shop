<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\FeaturedCategory;

class FeaturedCategoryController extends Controller
{
    
    public function create()
    {
        return view('admin.featuredCategory.create',[
            'featuredCategory' => FeaturedCategory::query()->first(),
            'categories' => Category::query()->where('category_id', null)->get()
        ]);
    }


    public function store(Request $request)
    {

        $this->validate($request, [
            'category_id' => ['required','exists:categories,id']
        ]);

        FeaturedCategory::query()->delete();

        FeaturedCategory::query()->create([
            'category_id' => $request->get('category_id') 
        ]);

        return back();
    }
}

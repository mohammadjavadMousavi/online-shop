<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\PropertyGroup;
use Illuminate\Http\Request;
use App\Http\Requests\NewCategoryRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.category.index',[
            'categories' => Category::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create', [
            'categories' => Category::all(),
            'properties' => propertyGroup::all()
        ]);
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NewCategoryRequest $request)
    {
        $category=Category::query()->create([
            'title' => $request->get('title'),
            'category_id' => $request->get('category_id'),
        ]);

        $category->propertyGroup()->attach($request->get('properties'));

                
        return redirect('/adminpanel/category/');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {

        return view('admin.category.edit', [
            'category' => $category,
            'categories' => Category::all(),
            'properties' => propertyGroup::all()
        ]);    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $category->update([
            'category_id' => $request->get('category_id'),
            'title' => $request->get('title')
        ]);

        $category->propertyGroup()->sync($request->get('properties'));

        return redirect('/adminpanel/category/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {

        $category->propertyGroup()->detach();

        $category->delete();

        return redirect('/adminpanel/category');
        
    }
}

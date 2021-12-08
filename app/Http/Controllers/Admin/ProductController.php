<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequestEdit;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.product.index',[
            'products' => Product::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.product.create',[
            'categories' => Category::query()->where('category_id',!null)->get(),
            'brands' => Brand::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $path=$request->file('image')->storeAs('public/products',$request->file('image')->getClientOriginalName());

        Product::query()->create([
            'name' => $request->get('name'),
            'category_id' => $request->get('category_id'),
            'brand_id' => $request->get('brand_id'),
            'slug' => $request->get('slug'),
            'price' => $request->get('price'),
            'description' => $request->get('description'),
            'image' => $path,
        ]);

        return redirect(route('product.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('admin.product.edit',[
            'product' => $product,
            'categories' => Category::all(),
            'brands' => Brand::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequestEdit $request, Product $product)
    {

        $slugOrg=Product::query()->where('slug',$request->get('slug'))->where('id','!=',$product->id)->exists();

        if ($slugOrg) {
            return redirect()->back()->withErrors(['slug' => 'slug already has been taken']);
        }


        $path=$product->image;

        if ($request->hasFile('image')) {
            $path=$request->file('image')->storeAs('public/products',$request->file('image')->getClientOriginalName());
        }

        $product->update([
            'name' => $request->get('name',$product->name),
            'category_id' => $request->get('category_id',$product->category_id),
            'brand_id' => $request->get('brand_id',$product->brand_id),
            'price' => $request->get('price',$product->price),
            'description' => $request->get('description',$product->description),
            'slug' => $request->get('slug',$product->slug),
            'image' => $path,
        ]);

        return redirect(route('product.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect(route('product.index'));
    }
}

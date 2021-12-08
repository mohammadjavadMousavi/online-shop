<?php

namespace App\Http\Controllers\Admin;

use App\Models\Brand;
use Illuminate\Http\Request;
use App\Http\Requests\BrandRequest;
use App\Http\Requests\BrandRequestEdit;
use App\Http\Controllers\Controller;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.brand.index',[
            'brands' => Brand::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.brand.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BrandRequest $request)
    {
        $path=$request->file('image')->storeAs('public/image',$request->file('image')->getClientOriginalName());
        Brand::query()->create([
            'name' => $request->get('name'),
            'image' => $path
        ]);
        return redirect(route('brand.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function show(Brand $brand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function edit(Brand $brand)
    {
        return view('admin.brand.edit',[
            'brand' => $brand
        ]);        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function update(BrandRequestEdit $request, Brand $brand)
    {

        // dd(Brand::all());

        $nameOrg=Brand::query()
        ->where('name',$request->get('name'))
        ->where('id','!=',$brand->id)
        ->exists();

        if ($nameOrg) {
            return redirect()->back()->withErrors(['name' => 'name has been already taken']);
        }

        $path=$brand->image;

        if ($request->hasFile('image')) {
            $path=$request->file('image')
            ->storeAs(
                'public/image', 
                $request->file('image')
                ->getClientOriginalName()
            );
        }

        $brand->update([
            'name' => $request->get('name'),
            'image' => $path
        ]);

        return redirect(route('brand.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function destroy(Brand $brand)
    {
        $brand->delete();

        return redirect(route('brand.index'));
    }
}

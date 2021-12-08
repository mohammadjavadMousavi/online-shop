<?php

namespace App\Http\Controllers\Admin;

use App\Models\PropertyGroup;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\PropertyGroupRequest;

class PropertyGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.propertyGroup.index',[
            'properties' => propertyGroup::all()
        ]);        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.propertyGroup.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PropertyGroupRequest $request)
    {

        PropertyGroup::query()->create([
            'title' => $request->get('title')
        ]);

        return redirect(route('propertyGroup.index'));
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PropertyGroup  $propertyGroup
     * @return \Illuminate\Http\Response
     */
    public function show(PropertyGroup $propertyGroup)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PropertyGroup  $propertyGroup
     * @return \Illuminate\Http\Response
     */
    public function edit(PropertyGroup $propertyGroup)
    {
        return view('admin.propertyGroup.edit',[
            'property' => $propertyGroup
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PropertyGroup  $propertyGroup
     * @return \Illuminate\Http\Response
     */
    public function update(PropertyGroupRequest $request, PropertyGroup $propertyGroup)
    {
        $propertyGroup->update([
            'title' => $request->get('title')
        ]);

        return redirect(route('propertyGroup.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PropertyGroup  $propertyGroup
     * @return \Illuminate\Http\Response
     */
    public function destroy(PropertyGroup $propertyGroup)
    {
        // $propertyGroup->delete();

        // return redirect(route('propertyGroup.index'));
    }
}

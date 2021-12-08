<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class Category extends Model
{
    use HasFactory;

    protected $guarded=[];

    public function parent()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function child()
    {
        return $this->hasMany(Category::class , 'category_id');
    }

    public function getSubChildrenCategory()
    {
        $childrenIds=$this->child()->pluck('id');

        return Product::query()->whereIn('category_id',$childrenIds)
        ->orWhere('category_id', $this->id)
        ->get();
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function getHasChildAttribute()
    {
        return $this->child()->count() > 0;
    }

    public function propertyGroup()
    {
        return $this->belongsToMany(PropertyGroup::class);
    }

    public function hasPropertyGroup(PropertyGroup $propertyGroup)
    {
        return $this->propertyGroup()->where('property_group_id',$propertyGroup->id)->exists();
    }
}

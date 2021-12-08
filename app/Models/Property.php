<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\PropertyGroup;
use App\Models\Product;
class Property extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function propertyGroup(){
        return $this->belongsTo(PropertyGroup::class);
    }


    public function products()
    {
        return $this->belongsToMany(Product::class,'product_property')
        ->withPivot(['value'])
        ->withTimestamps();
    }

    public function ValueForProduct(Product $product)
    {
        $ProductPropertyQuery = $this->products()->where('product_id', $product->id);



// dd($ProductPropertyQuery);

        if (!$ProductPropertyQuery->exists()) {
            return null;
        }


        return $ProductPropertyQuery->first()->pivot->value;
    }


}

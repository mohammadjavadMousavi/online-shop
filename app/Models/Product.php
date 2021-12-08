<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Picture;
use App\Models\Discount;
use App\Models\User;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;



class Product extends Model
{
    use HasFactory;

    protected $guarded= [];

    protected $appends = [
        'price_with_discount',
        'image_cart',
    ];

    public function brand(){
        return $this->belongsTo(Brand::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function pictures()
    {
        return $this->hasMany(Picture::class);
    }

    public function discount()
    {
        return $this->hasOne(Discount::class);
    }

    public function addPicture(Request $request)
    {
          $path=$request->file('image')->storeAs('public/products/pictures',
            $request->file('image')
            ->getClientOriginalName());

            $this->pictures()->create([
                'path' => $path,
                'mime' => $request->file('image')->getClientMimeType()
            ]);
    }

    public function pictureDelete(Picture $picture)
    {
         Storage::delete($picture->path);

        $picture->delete();
    }

    public function addDiscount(Request $request)
    {
         if (!$this->discount()->exists()) {

            $this->discount()->create([
                'value' => $request->get('value')
            ]);
            
        }else{
            $this->discount->update([
                'value' => $request->get('value')
            ]);
        }
    }

    public function deleteDiscount()
    {
        $this->discount()->delete();

    }

  

    public function getPriceWithDiscountAttribute()
    {
        if (!$this->discount()) {
            return $this->price;
        }

        return $this->price - $this->price * optional($this->discount)->value /100;
        
    }

    public function getHasDiscountAttribute(){
       return $this->discount()->exists();
    }

    public function getDiscountValueAttribute()
    {
        if ($this->has_discount) {
            return $this->discount->value;
        }

        return null;
    }


    public function properties()
    {
        return $this->belongsToMany(Property::class)
        ->withPivot(['value'])
        ->withTimestamps();
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

     public function likes()
    {
        return $this->belongsToMany(User::class, 'likes')
        ->withTimestamps();
    }

    public function getLikesHasAttribute()
    {
        return $this->likes()->where('user_id',auth()->id())->exists();
    }

    public function getImageCartAttribute()
    {
        return str_replace('public', '/storage', $this->image);
    }
}

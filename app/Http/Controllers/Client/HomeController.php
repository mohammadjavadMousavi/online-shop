<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Slide;
use App\Models\FeaturedCategory;

class HomeController extends Controller
{
    public function index(){

        return view('client.home',[
            'featuredCategory' => FeaturedCategory::getCategory(),
            'slides' => Slide::all()
        ]);
    }    
}

<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        $sliders = Slider::limit(25)->get();
        return view('slider',compact('sliders'));
    }
}

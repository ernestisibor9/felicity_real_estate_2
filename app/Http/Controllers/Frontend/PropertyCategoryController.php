<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Property;

class PropertyCategoryController extends Controller
{
    // FinishedProperty
    public function FinishedProperty(){
        $property = Property::where('property_category', 'finished_property')->latest()->get(); 
        return view('frontpage.category.finished_property', compact('property'));
}
}

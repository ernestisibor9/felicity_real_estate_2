<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PropertyType;
use App\Models\Property;

class BookInspectionController extends Controller
{
    // BookInspectRent
    public function BookInspectRent(){
        $propertyTypes = PropertyType::latest()->get(); 
        $property = Property::latest()->get(); 
        return view('frontpage.book_inspection.book_inspection_rent', compact('propertyTypes', 'property'));
    }
}

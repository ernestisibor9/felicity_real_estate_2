<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Property;

class SearchController extends Controller
{
    // SearchProperty
    public function SearchProperty(Request $request){
        $propertyName = $request->property_name;
        $ptypeId = $request->ptype_id;
        $city = $request->city;
        $state = $request->state;
        // $propertyCategory = $request->property_category;
        // $propertyStatus = $request->property_status;

        $property = Property::where('property_name', 'like', '%' .$propertyName. '%')->orWhere('city', '!==', $city)->orWhere('state', '!==', $state)->get();

        // $property = Property::where('property_name', 'like', '%' .$propertyName. '%')->orWhere('city', '!==', $city)->orWhere('property_category', '!==', $propertyCategory)->get();
        return view('frontpage.property.property_search', compact('property'));
    }
}

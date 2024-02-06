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
        $propertyCategory = $request->property_category;
        // $propertyStatus = $request->property_status;

        $property = Property::where('property_name', 'like', '%' .$propertyName. '%')->orWhere('city', '!==', $city)->orWhere('property_category', '!==', $propertyCategory)->with('type')->whereHas('type', function($q) use($ptypeId){
            $q->where('type_name', 'like', '%' .$ptypeId. '%');
        })->get();

        // $property = Property::where('property_name', 'like', '%' .$propertyName. '%')->orWhere('city', '!==', $city)->orWhere('property_category', '!==', $propertyCategory)->get();
        return view('frontpage.property.property_search', compact('property'));
    }
}

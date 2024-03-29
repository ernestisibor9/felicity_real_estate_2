<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Property;
use Illuminate\Http\Request;

class PriceController extends Controller
{
    //
    public function PriceFilter(){
        return view("frontpage.price.filter_price");
    }
    //
    public function StoreFilter(Request $request){
        $minPrice = $request->min_price;
        $maxPrice = $request->max_price;


        $products = Property::whereBetween('price', [$minPrice, $maxPrice])->get();
        // return response()->json($products);
        // dd($products);
        return view('frontpage.price.all_filter', compact('products'));
    }
    // StoreFilterFinished
    public function StoreFilterFinished(Request $request){
        $minPrice = $request->min_price;
        $maxPrice = $request->max_price;  
        $cityId = $request->city_id;

        try{
            $prop = Property::where('city_id', $cityId)->where('property_category', 'finished_property')->first();
            $property = Property::whereBetween('price', [$minPrice, $maxPrice])->where('city_id', $cityId)->where('property_category', 'finished_property')->get();
        // return response()->json($products);
        // dd($products);
        return view('frontpage.price.all_filter_finished', compact('property', 'prop'));
        }
        catch(\Exception $e){
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
    // StoreFilterUnfinished
    public function StoreFilterUnfinished(Request $request){
        $minPrice = $request->min_price;
        $maxPrice = $request->max_price;  
        $cityId = $request->city_id;

        try{
            $prop = Property::where('city_id', $cityId)->where('property_category', 'unfinished_property')->first();
            $property = Property::whereBetween('price', [$minPrice, $maxPrice])->where('city_id', $cityId)->where('property_category', 'unfinished_property')->get();
        // return response()->json($products);
        // dd($products);
        return view('frontpage.price.all_filter_unfinished', compact('property', 'prop'));
        }
        catch(\Exception $e){
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
    // StoreFilterLand
    public function StoreFilterLand(Request $request){
        $minPrice = $request->min_price;
        $maxPrice = $request->max_price;  
        $cityId = $request->city_id;

        try{
            $prop = Property::where('city_id', $cityId)->where('property_category', 'land')->first();
            $property = Property::whereBetween('price', [$minPrice, $maxPrice])->where('city_id', $cityId)->where('property_category', 'land')->get();
        // return response()->json($products);
        // dd($products);
        return view('frontpage.price.all_filter_land', compact('property', 'prop'));
        }
        catch(\Exception $e){
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}

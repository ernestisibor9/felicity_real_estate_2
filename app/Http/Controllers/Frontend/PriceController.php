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
}

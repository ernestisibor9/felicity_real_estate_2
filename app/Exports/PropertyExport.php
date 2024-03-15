<?php

namespace App\Exports;

use App\Models\Property;
use Maatwebsite\Excel\Concerns\FromCollection;

class PropertyExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        // return Property::all();
        return Property::select('property_name','property_status', 'property_category', 'short_desc','address', 'created_at')->get();
    }
}

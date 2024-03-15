<?php

namespace App\Imports;

use App\Models\Property;
use Maatwebsite\Excel\Concerns\ToModel;

class PropertyImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Property([
            //
            'id'     => $row[0],
            'ptype_id'     => $row[1],
            'property_name'     => $row[2],
            'property_slug'     => $row[3],
           'property_status'    => $row[4], 
           'property_category'    => $row[5],
           'price'     => $row[6],
           'property_thumbnail'     => $row[7],
           'short_desc'    => $row[8],
           'long_desc'    => $row[9],
           'bedrooms'    => $row[10],
           'bathrooms'    => $row[11],
           'garage'    => $row[12],
           'property_size'    => $row[13],
           'property_video'    => $row[14],
           'address'    => $row[15],
           'city_id'    => $row[16],
           'state'    => $row[17],
           'featured'    => $row[18],
           'hot'    => $row[19],
           'status'    => $row[20],
        //    'created_at'    => $row[20],
        //    'updated_at'    => $row[21],
        ]);
    }
}

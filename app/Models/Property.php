<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function type(){
        return $this->belongsTo(PropertyType::class, 'ptype_id', 'id');
    }

    public function multi_img(){
        return $this->belongsTo(MultiImage::class, 'id', 'property_id');
    }

    public function citys(){
        return $this->belongsTo(City::class, 'city_id', 'id');
    }

    // public function city(){
    //     return $this->hasMany(City::class, 'city_id', 'id');
    // }
}
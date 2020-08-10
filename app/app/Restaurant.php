<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Restaurant extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'user_id', 'store_name', 'store_infomation', 'prefecture_id', 'city', 'street_address', 'image_name',
        'high_budget', 'low_budget', 'latitude', 'longitude'
    ];

    protected $dates = ['deleted_at'];

    const RESTAURANT_TABLE = 'restaurants';

    public static function getAllRestaurants() {
        return self::latest('created_at')
            ->where('status', 2)
            ->get();
    }

    public static function getRestaurantById($id) {
        return self::where(self::RESTAURANT_TABLE . '.id', $id)
            ->first();
    }
}

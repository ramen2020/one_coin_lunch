<?php

namespace App;

use App\Services\SearchService;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Restaurant extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'user_id', 'store_name', 'store_infomation', 'prefecture_id', 'city', 'street_address', 'image_name',
        'high_budget', 'low_budget', 'latitude', 'longitude',
    ];

    protected $dates = ['deleted_at'];

    const RESTAURANT_TABLE = 'restaurants';

    // 店舗を全件取得
    public static function getAllRestaurants()
    {
        return self::latest('created_at')
            ->where('status', 2)
            ->get();
    }

    // idから店舗を取得
    public static function getRestaurantById($id)
    {
        return self::where(self::RESTAURANT_TABLE . '.id', $id)
            ->first();
    }

    // キーワードから店舗を取得
    public static function getRestaurantsByWord($words)
    {
        $restaurant_query = self::query();
        $restaurant_query->where(self::RESTAURANT_TABLE . '.status', 2)
            ->when($words, function ($query, $search) {
                return SearchService::querySearchWord($query, $search);
            });

        $restaurants = $restaurant_query->get();
        return $restaurants;
    }

    // 絞り込み検索の条件から店舗を取得
    public static function searchRestaurantsByfilter($request)
    {
        $request_search = $request->query();
        $restaurant_query = self::query();
        $restaurant_query = SearchService::querySearchFilter($request_search, $restaurant_query);
        $restaurants = $restaurant_query->get();
        return $restaurants;
    }

    // 都道府県から店舗を取得
    public static function getRestaurantsByPrefecture($prefecture_id)
    {
        return self::latest('created_at')
            ->where('status', 2)
            ->where('prefecture_id', $prefecture_id)
            ->get();
    }
}

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

    // ページネーションで１ページの表示数
    const PAGENATE_NUMBER = 6;

    // リレーション userテーブル
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    // リレーション いいねテーブル
    public function favorites()
    {
        return $this->hasMany(Favorite::class);
    }

    // 店舗を全件取得
    public static function getAllRestaurants()
    {
        return self::latest('created_at')
            ->where('status', 2)
            ->paginate(self::PAGENATE_NUMBER);
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

    // カテゴリから店舗を検索
    public static function getRestaurantsByCategory($category_id)
    {
        return self::latest('created_at')
            ->where('status', 2)
            ->where(function ($query) use ($category_id) {
                $query->where('restaurants' . '.category_id_1', $category_id)
                    ->orWhere('restaurants' . '.category_id_2', $category_id)
                    ->orWhere('restaurants' . '.category_id_3', $category_id)
                    ->orWhere('restaurants' . '.category_id_4', $category_id)
                    ->orWhere('restaurants' . '.category_id_5', $category_id);
            })->get();
    }
}

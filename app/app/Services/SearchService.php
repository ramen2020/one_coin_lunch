<?php

namespace App\Services;

use App\Restaurant;
use Illuminate\Support\Facades\DB;

class SearchService
{
    public function searchRestaurantsByWords($request_search)
    {
        return Restaurant::getRestaurantsByWord($request_search);
    }

    // ワード検索の検索条件
    public static function querySearchWord($query, $request_search)
    {
        return $query->where(function ($query) use ($request_search) {
            $request_search_words = self::makeArrayByWord($request_search);
            foreach ($request_search_words as $request_search_word) {
                $query->where(
                    DB::raw(
                        "CONCAT_WS(' ',
                            `restaurants`.`store_name`,
                            `restaurants`.`address`
                        )"
                    ),
                    'LIKE',
                    self::getLikeWord($request_search_word)
                );
            }
        });
    }

    // ワードを配列に分割
    public static function makeArrayByWord($word)
    {
        return preg_split("/[\s]+/", str_replace("　", " ", $word));
    }

    // 部分一致にするために、'％'で検索ワードを挟む
    public static function getLikeWord($value)
    {
        return '%' . addcslashes($value, '\_%') . '%';
    }

    // 絞り込み検索の条件から店舗を抽出する
    public static function querySearchFilter($request_search, $restaurant_query)
    {
        $restaurant_query->latest('created_at')->where('status', 2);

        if ($request_search['prefecture']) {
            $restaurant_query->where('restaurants' . '.prefecture_id', $request_search['prefecture']);
        }

        if ($request_search['city']) {
            $request_search_city = self::getLikeWord($request_search['city']);
            $restaurant_query->where('restaurants' . '.city', 'LIKE', $request_search_city);
        }

        if ($request_search['street_address']) {
            $request_search_street_address = self::getLikeWord($request_search['street_address']);
            $restaurant_query->where('restaurants' . '.street_address', 'LIKE', $request_search_street_address);
        }

        if ($request_search['low_budget']) {
            $restaurant_query->where('restaurants' . '.low_budget', ">=", $request_search['low_budget']);
        }

        if ($request_search['high_budget']) {
            $restaurant_query->where('restaurants' . '.high_budget', "<=", $request_search['high_budget']);
        }

        // カテゴリから抽出
        for ($i = 1; $i <= 5; $i++) {
            if ($request_search['category_id_' . $i]) {
                $restaurant_query->where(function ($query) use ($request_search, $i) {
                    $query->where('restaurants' . '.category_id_1', $request_search['category_id_' . $i])
                        ->orWhere('restaurants' . '.category_id_2', $request_search['category_id_' . $i])
                        ->orWhere('restaurants' . '.category_id_3', $request_search['category_id_' . $i])
                        ->orWhere('restaurants' . '.category_id_4', $request_search['category_id_' . $i])
                        ->orWhere('restaurants' . '.category_id_5', $request_search['category_id_' . $i]);
                });
            }
        }

        return $restaurant_query;
    }

}

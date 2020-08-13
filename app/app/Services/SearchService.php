<?php

namespace App\Services;

use App\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchService
{
    public function searchRestaurantsByWords($search)
    {
        return Restaurant::getRestaurantsByWord($search);
    }

    // ワード検索の検索条件
    public static function querySearchWord($query, $search)
    {
        return $query->where(function ($query) use ($search) {
            $search_words = self::makeArrayByWord($search);
            foreach ($search_words as $search_word) {
                $query->where(
                    DB::raw(
                        "CONCAT_WS(' ',
                            `restaurants`.`store_name`,
                            `restaurants`.`address`
                        )"
                    ),
                    'LIKE',
                    self::getLikeWord($search_word)
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

}

<?php

namespace App;

use App\Restaurant;
use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    public $timestamps = false;

    // リレーション　restaurantsテーブル
    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }

    public function isFavorite($user_id, $restaurant_id)
    {
        return (boolean) $this->where('user_id', $user_id)->where('restaurant_id', $restaurant_id)->first();
    }

    public function getFavoriteId($user_id, $restaurant_id)
    {
        return $this->where('restaurant_id', $restaurant_id)
            ->where("user_id", $user_id)
            ->first('id');
    }

    // いいね保存
    public function storeFavorite($user_id, $restaurant_id)
    {
        $this->user_id = $user_id;
        $this->restaurant_id = $restaurant_id;
        $this->save();
    }

    // いいね削除
    public function deleteFavorite($favorite_id)
    {
        return $this->where('id', $favorite_id)->delete();
    }

    //　いいね数える
    public function getFavoritedCount($restaurant_id)
    {
        $favorited_count = count($this->where('restaurant_id', $restaurant_id)->get());
        return $favorited_count;
    }
}

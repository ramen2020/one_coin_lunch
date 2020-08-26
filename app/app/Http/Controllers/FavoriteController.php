<?php

namespace App\Http\Controllers;

use App\Favorite;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    private $favorite;

    public function __construct(Favorite $favorite)
    {
        $this->favorite = $favorite;
    }

    // いいね
    public function store(Request $request)
    {
        $input = $request->all();
        $user_id = \Auth::id();
        $restaurant_id = $input['restaurantId'];
        $is_favorite = $this->favorite->isFavorite($user_id, $restaurant_id);

        if (!$is_favorite) {
            $this->favorite->storeFavorite($user_id, $restaurant_id);
        }

        $favorite_count = $this->favorite->getFavoritedCount($restaurant_id);
        $favorite_id = $this->favorite->getFavoriteId($user_id, $restaurant_id)->id;

        return response()->json([
            "favorite_count" => $favorite_count,
            "favorite_id" => $favorite_id]
        );
    }

    // いいね解除
    public function destroy($favorite_id, Request $request)
    {
        $input = $request->all();
        $user_id = \Auth::id();
        $restaurant_id = $input['restaurantId'];
        $is_favorite = $this->favorite->isFavorite($user_id, $restaurant_id);

        if ($is_favorite) {
            $this->favorite->deleteFavorite($favorite_id);
        }
        $favorite_count = $this->favorite->getFavoritedCount($restaurant_id);
        $favorite_id = @$this->favorite->getFavoriteId($user_id, $restaurant_id)->id;

        return response()->json([
            "favorite_count" => $favorite_count,
            "favorite_id" => $favorite_id,
        ]);
    }
}

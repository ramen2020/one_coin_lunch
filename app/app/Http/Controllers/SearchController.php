<?php

namespace App\Http\Controllers;

use App\Http\Requests\SearchFilterRequest;
use App\Restaurant;
use App\Services\RestaurantService;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    protected $restaurant;
    protected $restaurant_service;

    public function __construct(Restaurant $restaurant, RestaurantService $restaurant_service)
    {
        $this->restaurant = $restaurant;
        $this->restaurant_service = $restaurant_service;
    }

    // キーワード検索
    public function word(Request $request)
    {
        $query = $request->query();
        $word = $query['word'];
        $set_restaurants = $this->restaurant->getRestaurantsByWord($word);
        $restaurants = $this->restaurant_service->addFavoriteIdToRestaurants($set_restaurants);

        return view('search.result', compact('restaurants'));
    }

    // Gmap検索
    public function map()
    {
        $restaurants = $this->restaurant->all();
        return response()->json(['marker' => $restaurants]);
    }

    // 絞り込み検索
    public function filter(SearchFilterRequest $request)
    {
        $set_restaurants = $this->restaurant->searchRestaurantsByfilter($request);
        $restaurants = $this->restaurant_service->addFavoriteIdToRestaurants($set_restaurants);
        return view('search.result', compact('restaurants'));
    }

    // 都道府県から検索
    public function filterByPrefecture($prefecture_id)
    {
        $set_restaurants = $this->restaurant->getRestaurantsByPrefecture($prefecture_id);
        $restaurants = $this->restaurant_service->addFavoriteIdToRestaurants($set_restaurants);
        return view('search.result', compact('restaurants'));
    }

    // 都道府県から検索
    public function filterByCategory($category_id)
    {
        $set_restaurants = $this->restaurant->getRestaurantsByCategory($category_id);
        $restaurants = $this->restaurant_service->addFavoriteIdToRestaurants($set_restaurants);
        return view('search.result', compact('restaurants'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Restaurant;
use App\Services\SearchService;
use Illuminate\Http\Request;
use App\Http\Requests\SearchFilterRequest;

class SearchController extends Controller
{
    protected $search_service;

    public function __construct(SearchService $search_service)
    {
        $this->search_service = $search_service;
    }

    // キーワード検索
    public function word(Request $request) {
        $query = $request->query();
        $word = $query['word'];
        $restaurants = Restaurant::getRestaurantsByWord($word);

        return view('search.result', compact('restaurants'));
    }

    // Gmap検索
    public function map()
    {
        $restaurants = Restaurant::getAllRestaurants();
        return response()->json(['marker' => $restaurants]);
    }

    // 絞り込み検索
    public function filter(SearchFilterRequest $request)
    {
        $restaurants = Restaurant::searchRestaurantsByfilter($request);
        return view('search.result', compact('restaurants'));
    }

    // 都道府県から検索
    public function filterByPrefecture($prefecture_id)
    {
        $restaurants = Restaurant::getRestaurantsByPrefecture($prefecture_id);
        return view('search.result', compact('restaurants'));
    }

    // 都道府県から検索
    public function filterByCategory($category_id)
    {
        $restaurants = Restaurant::getRestaurantsByCategory($category_id);
        return view('search.result', compact('restaurants'));
    }
}

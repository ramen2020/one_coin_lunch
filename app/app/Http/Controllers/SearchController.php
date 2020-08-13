<?php

namespace App\Http\Controllers;

use App\Restaurant;
use App\Services\SearchService;
use Illuminate\Http\Request;

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
        $restaurants = $this->search_service->searchRestaurantsByWords($word)->toArray();

        return view('search.result', compact('restaurants'));
    }

    // Gmap検索
    public function map()
    {
        $restaurants = Restaurant::getAllRestaurants();
        return response()->json(['marker' => $restaurants]);
    }

    // グーグルアカウント作り直し、apiキー作って読み込む、お問い合わせも変える

    // 絞り込み検索
    public function filter(Request $request)
    {
        $restaurants = Restaurant::searchRestaurantsByfilter($request)->toArray();
        return view('search.result', compact('restaurants'));
    }
}

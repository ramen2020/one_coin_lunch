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


}

<?php

namespace App\Http\Controllers;

use App\Restaurant;
use App\Favorite;
use App\Services\RestaurantService;
use App\Http\Requests\Restaurant\StoreRestaurantRequest;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    private $restaurant_service;
    private $favorite;
    private $category_list;

    public function __construct(RestaurantService $restaurant_service, Favorite $favorite)
    {
        $this->restaurant_service = $restaurant_service;
        $this->favorite = $favorite;
        $this->category_list = config('data.category');
    }

    public function newRestaurants()
    {
        $category_list = $this->category_list;
        $restaurants = Restaurant::with(['user','favorites'])
            ->orderby('restaurants.created_at', 'DESC')
            ->paginate(6);

        $restaurants = $restaurants->toArray();

        foreach($restaurants['data'] as &$restaurant) {
            foreach($restaurant['favorites'] as $favorite) {
                if($favorite['user_id'] == \Auth::id()) {
                    $restaurant['is_favorite'] = true;
                    $restaurant['favorite_id_by_auth'] = $favorite['id'];
                }
            }
        }

        unset($restaurant);

        return response()->json(['restaurants' => $restaurants, 'catogory_list' => $category_list]);
    }

    public function index()
    {
        return view('top.top');
    }


    public function create()
    {
        return view('restaurant.create');
    }

    public function confirm(StoreRestaurantRequest $request)
    {
        $restaurant = $request->all();
        return view('restaurant.confirm', compact('restaurant'));
    }

    public function store(StoreRestaurantRequest $request)
    {
        $input = $request->except('submit');

        // 戻るボタン
        if ($request->submit === '戻る') {
            return redirect()->route('restaurant.create')->withInput($input);
        }

        $this->restaurant_service->setCategoryId($request)
            ->createRestaurant($request);
        return view('restaurant.complete', compact('input'));
    }

    public function show($id)
    {
        $user = \Auth::user();
        $favorite_id = @$this->favorite->getFavoriteId($user->id, $id)->id ?: null;
        $restaurant = $this->restaurant_service->getRestaurantById($id);
        return view('restaurant.detail', compact('user', 'favorite_id', 'restaurant'));
    }

    public function favoriteList()
    {
        $user = \Auth::user();
        $favorite_restaurants = \Auth::user()->favorites()->with('restaurant')->get();
        $restaurants = [];

        foreach($favorite_restaurants as $favorite) {
            $favorite->restaurant['favorite_id'] = $favorite['id'];
            array_push($restaurants, $favorite->restaurant);
        }

        return view('restaurant.favorite', compact('restaurants'));
    }
}

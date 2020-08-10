<?php

namespace App\Http\Controllers;

use App\Restaurant;
use App\Services\RestaurantService;
use App\Http\Requests\Restaurant\StoreRestaurantRequest;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    private $restaurant_service;

    public function __construct(RestaurantService $restaurant_service)
    {
        $this->restaurant_service = $restaurant_service;
    }

    public function index()
    {
        $restaurants = $this->restaurant_service->getAllRestaurants();
        return view('top.top' , compact('restaurants'));
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
        $restaurant = $this->restaurant_service->getRestaurantById($id);
        return view('restaurant.detail', compact('restaurant'));
    }

    public function edit($id)
    {
        //
    }

    public function update(StoreRestaurantRequest $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}

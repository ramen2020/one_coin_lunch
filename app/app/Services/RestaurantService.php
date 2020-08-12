<?php

namespace App\Services;

use App\Restaurant;

class RestaurantService
{
    protected $restaurant;

    public function __construct(Restaurant $restaurant)
    {
        $this->restaurant = $restaurant;
    }

    // 店舗全件取得
    public function getAllRestaurants()
    {
        $this->restaurants = $this->restaurant->getAllRestaurants();
        return $this->restaurants;
    }

    public function getRestaurantById($id)
    {
        $this->restaurant = $this->restaurant->getRestaurantById($id);
        return $this->restaurant;
    }

    // フォームから送られてきたcategoryを成形
    public function setCategoryId($request)
    {
        $category_array = [];

        for ($i = 1; $i <= 5; $i++) {
            $request_category_id = $request['category_id_' . $i];

            if (!empty($request_category_id)) {
                array_push($category_array, $request['category_id_' . $i]);
            }
        }

        sort($category_array);
        $this->category_array = $category_array;
        return $this;
    }

    // 店舗の新規登録
    public function createRestaurant($request)
    {
        $create_restaurant = $this->restaurant;
        $create_restaurant->user_id = \Auth::id();
        $create_restaurant->status = 2;
        $create_restaurant->store_name = $request['store_name'];
        $create_restaurant->store_infomation = $request['store_infomation'];
        $create_restaurant->address =
            config('data.prefecture')[$request['prefecture']] .$request['city'] .$request['street_address'];
        $create_restaurant->prefecture_id = $request['prefecture'];
        $create_restaurant->city = $request['city'];
        $create_restaurant->street_address = $request['street_address'];
        // $create_restaurant->image_name = $request->image_name;
        $create_restaurant->high_budget = $request['high_budget'];
        $create_restaurant->low_budget = $request['low_budget'];
        $create_restaurant->latitude = !empty($request['latitude']) ? $request['latitude'] : null;
        $create_restaurant->longitude = !empty($request['longitude']) ? $request['longitude'] : null;
        $create_restaurant->category_id_1 = !empty($this->category_array[0]) ? $this->category_array[0] : null;
        $create_restaurant->category_id_2 = !empty($this->category_array[1]) ? $this->category_array[1] : null;
        $create_restaurant->category_id_3 = !empty($this->category_array[2]) ? $this->category_array[2] : null;
        $create_restaurant->category_id_4 = !empty($this->category_array[3]) ? $this->category_array[3] : null;
        $create_restaurant->category_id_5 = !empty($this->category_array[4]) ? $this->category_array[4] : null;
        $create_restaurant->save();
    }

}

<?php

namespace App\Http\Controllers;

use App\Restaurant;
use App\Favorite;
use App\Services\RestaurantService;
use App\Http\Requests\Restaurant\StoreRestaurantRequest;
use App\Http\Requests\Restaurant\AddRestaurantImageRequest;
use Illuminate\Support\Facades\Storage;

class RestaurantController extends Controller
{
    private $restaurant_service;
    private $restaurant;
    private $favorite;
    private $category_list;

    public function __construct(Restaurant $restaurant, RestaurantService $restaurant_service, Favorite $favorite)
    {
        $this->restaurant_service = $restaurant_service;
        $this->restaurant = $restaurant;
        $this->favorite = $favorite;
        $this->category_list = config('data.category');
    }

    public function newRestaurants()
    {
        $category_list = $this->category_list;
        $restaurants = $this->restaurant->with(['user','favorites'])
            ->orderby('restaurants.created_at', 'DESC')
            ->paginate(6);

        $restaurants = $this->restaurant_service->addFavoriteIdToRestaurants($restaurants);

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

        $create_restaurant = $this->restaurant_service->setCategoryId($request)
            ->createRestaurant($request);
            return redirect()->route('restaurant.show', $create_restaurant['id'])
                ->with('restaurant_message', '投稿しました。画像編集から画像を追加してください。');
    }

    public function edit($id)
    {
        $restaurant = $this->restaurant_service->getRestaurantById($id);
        return view('restaurant.edit', compact('restaurant'));
    }

    public function update(StoreRestaurantRequest $request, $restaurant_id)
    {
        $set_restaurant = $this->restaurant_service->getRestaurantById($restaurant_id);

        if($set_restaurant['user_id'] != \Auth::id()) {
            return redirect('/');
        }

        $this->restaurant_service->setCategoryId($request)
            ->updateRestaurant($request, $set_restaurant);

        return redirect()->route('restaurant.show', $restaurant_id)
            ->with('restaurant_message', '更新しました。');
    }

    public function updateImage(AddRestaurantImageRequest $request)
    {
        $image = $request->file('file');
        $id = $request->input('restaurantId');
        $path = Storage::disk('s3')->putFile('/restaurant-images', $image, 'public');
        $url = Storage::disk('s3')->url($path);
        $this->restaurant->where('id', $id)->update(['image_name' => $url]);
        return response()->json($url);
    }

    public function show($id)
    {
        $user = \Auth::user();
        $favorite_id = @$this->favorite->getFavoriteId($user->id, $id)->id ?: null;
        $restaurant = $this->restaurant_service->getRestaurantById($id);
        return view('restaurant.show', compact('user', 'favorite_id', 'restaurant'));
    }

    public function favoriteList()
    {
        $user_id = \Auth::id();
        $restaurants = $this->restaurant->whereHas('favorites', function($query) use ($user_id) {
            $query->where('user_id', $user_id);
        })->with(['user', 'favorites'])->get();
        $restaurants = $this->restaurant_service->addFavoriteIdToRestaurants($restaurants);
        return view('restaurant.favorite', compact('restaurants'));
    }

    public function destroy($restaurant_id, $user_id)
    {
        $restaurant = $this->restaurant->with('user:id')->find($restaurant_id);
        $request_user_id = $restaurant->user->id;
        $user_id = \Auth::id();

        if($request_user_id === $user_id) {
            $restaurant = $this->restaurant->find($restaurant_id);
            $restaurant->favorites()->delete();
            if(!empty($restaurant->image_name) &&
                $restaurant->image_name !== config('data.no_image_photo')[1]) {
                    $image_name = basename($restaurant->image_name);
                    $image_path = "/restaurant-images/" .$image_name;
                    Storage::disk('s3')->delete($image_path);
            }
            $restaurant->delete();
        }

        return redirect()->route('user.myProfile')->with('restaurant_message', '投稿を削除しました。');
    }
}

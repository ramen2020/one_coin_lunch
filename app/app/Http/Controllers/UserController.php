<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddUserImageRequest;
use App\Http\Requests\UpdateUserProfileRequest;
use App\Services\RestaurantService;
use App\User;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    protected $user;
    protected $restaurant_service;

    public function __construct(User $user, RestaurantService $restaurant_service)
    {
        $this->user = $user;
        $this->restaurant_service = $restaurant_service;
    }

    public function profile($id)
    {
        $user = $this->user->getUserById($id);
        $set_restaurants = $user->restaurants()->with('favorites')->get();
        $restaurants = $this->restaurant_service->addFavoriteIdToRestaurants($set_restaurants);

        return view('user.show', compact('user', 'restaurants'));
    }

    public function myProfile()
    {
        $user = \Auth::user();
        $set_restaurants = $user->restaurants()->with('favorites')->get();
        $restaurants = $this->restaurant_service->addFavoriteIdToRestaurants($set_restaurants);
        return view('user.show', compact('user', 'restaurants'));
    }

    public function editMyProfile()
    {
        $user = \Auth::user();
        return view('user.edit', compact('user'));
    }

    public function updateImage(AddUserImageRequest $request)
    {
        $image = $request->file('file');
        $id = $request->input('userId');
        $path = Storage::disk('s3')->putFile('/user-images', $image, 'public');
        $url = Storage::disk('s3')->url($path);
        $user = $this->user->find($id);
        $user->profile_image = $url;
        $user->save();
        return response()->json($url);
    }

    public function updateProfile(UpdateUserProfileRequest $request)
    {
        $user = \Auth::user();
        $input = $request->all();
        $user->name = $input['name'];
        $user->email = $input['email'];
        $user->introduction = $input['introduction'];
        $user->save();
        return redirect()->route('user.myProfile');
    }

    public function destroy()
    {
        $user = \Auth::user();
        $user->restaurants()->delete();
        $user->favorites()->delete();
        \Auth::logout();
        $user->delete();
        return redirect('/');
    }
}

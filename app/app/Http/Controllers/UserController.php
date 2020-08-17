<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Requests\AddImageRequest;
use App\Http\Requests\UpdateUserProfileRequest;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function profile($id)
    {
        $user = $this->user->getUserById($id);
        $restaurants = $user->restaurants->toArray();
        return view('user.show', compact('user', 'restaurants'));
    }

    public function myProfile()
    {
        $user = \Auth::user();
        $restaurants = $user->restaurants->toArray();
        return view('user.show', compact('user', 'restaurants'));
    }

    public function editMyProfile()
    {
        $user = \Auth::user();
        return view('user.edit', compact('user'));
    }

    public function updateImage(AddImageRequest $request)
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

    public function destroy($id)
    {
        //
    }
}
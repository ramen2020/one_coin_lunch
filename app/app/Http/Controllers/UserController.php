<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Requests\AddImageRequest;
use Illuminate\Http\Request;
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
        $my_user_id = \Auth::id();
        $my_user = $this->user->getUserById($my_user_id);
        return view('user.show', compact('my_user'));
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

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
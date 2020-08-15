<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

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

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}

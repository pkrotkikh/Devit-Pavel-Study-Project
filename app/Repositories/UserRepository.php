<?php
namespace App\Repositories;

use App\Interfaces\UserRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserRepository implements UserRepositoryInterface
{
    public function getAllUsers() : Collection
    {
        return User::all();
    }

    public function getUserById($userId) : User
    {
        return User::findOrFail($userId);
    }

    public function deleteUser($userId) : int
    {
        return User::destroy($userId);
    }

    public function createUser(Request $request) : User
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        return $user;
    }

    public function updateUser(Request $request) : User
    {
        $user = User::find($request->id);
        $user->save();
        return $user;
    }
}

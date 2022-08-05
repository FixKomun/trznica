<?php

namespace App\Repositories;

use App\Interfaces\UserRepositoryInterface;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserRepository implements UserRepositoryInterface
{
    public function registerUser(array $userDetails)
    {
        return User::create($userDetails);
    }
    public function loginUser(array $userDetails)
    {
        //dd($userDetails['password']);
        if (Auth::attempt(['email' => $userDetails['email'], 'password' => $userDetails['password']])) {
            $user = Auth::user();
            return [
                'msg' => 'Uspješno ste se ulogirali!',
                'user' => $user
            ];
        } else {
            return response()->json([
                'msg' => 'Nepostojeći korisnik',
            ], 401);
        }
    }
    public function getAllUsers()
    {
        return User::all();
    }
    public function logoutUser()
    {
        Auth::logout();
        return redirect("/");
    }
    public function getUserSingle($id)
    {

        return User::where('id', $id)->get();
    }
    public function editUser(array $userDetails, $id)
    {
        return User::where('id', $id)->update($userDetails);
    }
}

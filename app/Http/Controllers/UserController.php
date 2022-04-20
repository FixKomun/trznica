<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        return view('welcome');
    }
    public function register(Request $request)
    {
        $this->validate($request, [
            'firstName' => 'required|max:30',
            'lastName' => 'required|max:30',
            'address' => 'required|max:50',
            'zipCode' => 'bail|required|numeric|',
            'city' => 'bail|required|string|max:30',
            'phoneNumber' => 'bail|required|max:17',
            'email' => 'bail|required|email|unique:users|max:40',
            'password' => 'bail|required|min:6'
        ]);

        $password = bcrypt($request->password);

        User::create([
            'firstName' => $request->firstName,
            'lastName' => $request->lastName,
            'address' => $request->address,
            'zipCode' => $request->zipCode,
            'city' => $request->city,
            'phoneNumber' => $request->phoneNumber,
            'email' => $request->email,
            'password' => $password
        ]);
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'bail|required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::user();
            return response()->json([
                'msg' => 'Uspješno ste se ulogirali!',
                'user' => $user
            ]);
        } else {
            return response()->json([
                'msg' => 'Nepostojeći korisnik'
            ], 401);
        }
    }
    public function logout()
    {
        Auth::logout();
        return redirect("/");
    }

    public function getUser()
    {
        return User::all();
    }
}

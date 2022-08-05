<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserEditRequest;
use App\Http\Requests\UserRegisterRequest;
use App\Http\Requests\UserLoginRequest;
use App\Interfaces\UserRepositoryInterface;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }
    public function index()
    {
        return view('welcome');
    }
    public function register(UserRegisterRequest $request)
    {
        $request->validated();

        $password = $request->safe();
        $encrypted = bcrypt($password['password']);

        $userDetails = ([
            'firstName' => $request->firstName,
            'lastName' => $request->lastName,
            'address' => $request->address,
            'zipCode' => $request->zipCode,
            'city' => $request->city,
            'phoneNumber' => $request->phoneNumber,
            'email' => $request->email,
            'password' => $encrypted
        ]);

        return response()->json([
            'data' => $this->userRepository->registerUser($userDetails)
        ]);
    }

    public function login(UserLoginRequest $request)
    {
        $request->validated();
        $userDetails = $request->all([
            'email',
            'password'
        ]);

        return $this->userRepository->loginUser($userDetails);
    }
    public function logout()
    {
        return $this->userRepository->logoutUser();
    }

    public function getUser()
    {
        return $this->userRepository->getAllUsers();
    }

    public function getUserSingle(Request $request)
    {
        $id = $request->id;
        return response()->json($this->userRepository->getUserSingle($id));
    }
    public function editUser(UserEditRequest $request)
    {
        $request->validated();
        $id = $request->id;
        $userDetails = [
            'firstName' => $request->firstName,
            'lastName' => $request->lastName,
            'address' => $request->address,
            'zipCode' => $request->zipCode,
            'city' => $request->city,
            'phoneNumber' => $request->phoneNumber,
        ];

        return response()->json([
            'data' => $this->userRepository->editUser($userDetails, $id)
        ]);
    }
}

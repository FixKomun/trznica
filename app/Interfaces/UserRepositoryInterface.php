<?php

namespace App\Interfaces;

interface UserRepositoryInterface
{
    public function registerUser(array $userDetails);
    public function loginUser(array $userDetails);
    public function getAllUsers();
    public function logOutUser();
    public function getUserSingle($id);
    public function editUser(array $userDetails, $id);
}

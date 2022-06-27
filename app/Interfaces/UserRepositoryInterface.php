<?php

namespace App\Interfaces;

use Illuminate\Http\Request;

interface UserRepositoryInterface
{
    public function getAllUsers();
    public function getUserById($userId);
    public function deleteUser($userId);
    public function createUser(Request $request);
    public function updateUser(Request $request);
}

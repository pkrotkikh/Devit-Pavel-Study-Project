<?php

namespace App\Interfaces;

use Illuminate\Http\Request;

interface UserRepositoryInterface
{
    public function createUser(Request $request);
    public function updateUser(Request $request);
}

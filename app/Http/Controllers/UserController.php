<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repository\UserRepository;

class UserController extends Controller
{
    public function index(UserRepository $userRepository)
    {
        return view('user.index', ['users' => $userRepository->findAll()]);
    }
}

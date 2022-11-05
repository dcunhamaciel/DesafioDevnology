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

    public function create()
    {
        return view('user.create');
    }

    public function store(Request $request, UserRepository $userRepository)
    {
        $request['password'] = '123';

        $userRepository->create($request->all());

        return redirect()->route('user.index');
    }
}

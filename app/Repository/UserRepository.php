<?php

namespace App\Repository;

use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserRepository
{
    private User $user;

	public function __construct(User $user)
	{
		$this->user = $user;
	}

    public function create(array $data): User
    {
        $user = new User();
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->password = Hash::make($data['password']);
        $user->save();
        
        return $user;
    }

    public function findByEmail(string $email): ?User
    {
        $user = $this->user
            ->where('email', $email)
            ->first();           

        return $user;
    }
}

<?php

namespace App\Repository;

use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Collection;
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

    public function update(int $id, array $data): User
    {
        $user = $this->user->find($id);
        $user->name = $data['name'];
        $user->save();

        return $user;
    }

    public function delete(int $id): void
    {
        $user = $this->user->find($id);
        $user->delete($id);
    }

    public function findAll(): ?Collection
    {
        $users = $this->user->orderBy('name')->get();

        return $users;
    }

    public function findById(int $id): ?User
    {
        $user = $this->user->find($id);           

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

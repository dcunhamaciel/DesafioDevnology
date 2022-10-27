<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Repository\UserRepository;

class UserSeeder extends Seeder
{
    private UserRepository $userRepository;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->userRepository = new UserRepository(new User());

        $this->createUser('Diego Maciel', 'dcunhamaciel@gmail.com', '123');
        $this->createUser('Guilherme Mendes', 'guilhermel@gmail.com', '123');
    }

    private function createUser(string $name, string $email, string $password)
    {        
        $hasUser = $this->userRepository->findByEmail($email);
        if (!$hasUser) {
            $this->userRepository->create([
                'name' => $name,
                'email' => $email,
                'password' => $password
            ]);
        }
    }    
}

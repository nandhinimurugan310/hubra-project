<?php
namespace App\Repositories;

use App\Models\User;

class UserRepository implements UserRepositoryInterface {
    public function create(array $data) {
        return User::create($data);
    }

    public function findById($id) {
        return User::find($id);
    }

    public function findByEmail($email) {
        return User::where('email', $email)->first();
    }
        // Implement getAll to return all users
        public function getAll()
        {
            return User::all();
        }
        public function update($id, array $data) {
            $user = User::find($id);
            if ($user) {
                $user->update($data);
                return $user;
            }
            return null;
        }
    
}

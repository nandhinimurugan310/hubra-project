<?php
namespace App\Repositories;

interface UserRepositoryInterface {
    public function create(array $data);
    public function findById($id);
    public function findByEmail($email);
    public function getAll(); // Define the getAll method
    public function update($id, array $data);
}

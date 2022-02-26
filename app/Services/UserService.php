<?php

namespace App\Services;

use App\Models\User;
use App\Repositories\UserRepository;
use Illuminate\Database\Eloquent\Collection;

class UserService
{
    public function __construct(private UserRepository $repository)
    {
    }

    public function getAll($skip): Collection
    {
        return $this->repository->getAll($skip);
    }

    public function getById(string $id): User
    {
        return $this->repository->getById($id);
    }

    public function getByEmail(string $email): User
    {
        return $this->repository->getByEmail($email);
    }

    public function save(array $data): User
    {
        return $this->repository->save($data);
    }

    public function update(array $data, string $id): User
    {
        return $this->repository->update($data, $id);
    }

    public function delete(string $id): void
    {
        $this->repository->delete($id);
    }
}

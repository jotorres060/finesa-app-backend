<?php

namespace App\Repositories;

use App\Models\User;

class UserRepository
{
    protected User $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function getAll($skip = 0)
    {
        return $this->user->orderBy('name')->skip($skip)->take(10)->get();
    }

    public function getById(string $id): ?User
    {
        return $this->user->findOrFail($id);
    }

    public function getByEmail(string $email): ?User
    {
        return $this->user->where('email', $email)->first();
    }

    public function save(array $data): User
    {
        $user = new $this->user;
        return $user->create($data);
    }

    public function update(array $data, string $id): User
    {
        $user = $this->getById($id);
        $user->update($data);
        return $user;
    }

    public function delete(string $id): void
    {
        $user = $this->getById($id);
        // $user->update(['state_id' => 2]);
    }
}

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

    public function getByEmail(string $email): ?User
    {
        return $this->repository->getByEmail($email);
    }
}

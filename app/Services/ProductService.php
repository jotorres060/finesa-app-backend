<?php

namespace App\Services;

use App\Models\Product;
use App\Repositories\ProductRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;

class ProductService
{
    public function __construct(private ProductRepository $repository)
    {
    }

    public function getAll(): Collection
    {
        return $this->repository->getAll();
    }

    public function getById(string $id): ?Product
    {
        return $this->repository->getById($id);
    }

    public function save(array $data): Product
    {
        $data['user_id'] = Auth::user()->id;
        return $this->repository->save($data);
    }

    public function update(array $data, Product $product): Product
    {
        return $this->repository->update($data, $product);
    }
}

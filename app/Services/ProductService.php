<?php

namespace App\Services;

use App\Models\Product;
use App\Repositories\ProductRepository;
use Illuminate\Database\Eloquent\Collection;

class ProductService
{
    public function __construct(private ProductRepository $repository)
    {
    }

    public function getAll($skip): Collection
    {
        return $this->repository->getAll($skip);
    }

    public function getById(string $id): ?Product
    {
        return $this->repository->getById($id);
    }

    public function save(array $data): Product
    {
        return $this->repository->save($data);
    }

    public function update(array $data, Product $product): Product
    {
        return $this->repository->update($data, $product);
    }

    public function delete(Product $product): void
    {
        $this->repository->delete($product);
    }
}

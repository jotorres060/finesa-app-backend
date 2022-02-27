<?php

namespace App\Repositories;

use App\Models\Product;

class ProductRepository
{
    protected Product $product;

    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    public function getAll()
    {
        return $this->product->orderByDesc('id')->get();
    }

    public function getById(string $id): ?Product
    {
        return $this->product->findOrFail($id);
    }

    public function save(array $data): Product
    {
        return $this->product::firstOrCreate($data);
    }

    public function update(array $data, Product $product): Product
    {
        $product->update($data);
        return $product;
    }
}

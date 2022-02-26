<?php

namespace App\Repositories;

use Illuminate\Support\Facades\Auth;

use App\Models\Product;

class ProductRepository
{
    protected Product $product;

    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    public function getAll($skip = 0)
    {
        return $this->product->orderByDesc('id')->skip($skip)->take(10)->get();
    }

    public function getById(string $id): ?Product
    {
        return $this->product->findOrFail($id);
    }

    public function save(array $data): Product
    {
        $data['user_id'] = Auth::user()->id;
        $product = new $this->product;
        return $product->create($data);
    }

    public function update(array $data, Product $product): Product
    {
        $product->update($data);
        return $product;
    }

    public function delete(Product $product): void
    {
        $product->update(['state' => 'false']);
    }
}

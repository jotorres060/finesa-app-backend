<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Services\ProductService;
use App\Models\Product;

class ProductController extends Controller
{
    public function __construct(private ProductService $productService)
    {
    }

    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        try {
            $skip = $request->input('skip');
            $products = $this->productService->getAll($skip);
            return response()->json($products, 200);
        } catch (\Exception $ex) {
            return response()->json([
                'error' => true
            ], 500);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $data = $request->only(['name', 'price']);
            $products = $this->productService->save($data);
            return response()->json($products, 201);
        } catch (\Exception $ex) {
            return response()->json([
                'error' => true
            ], 500);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Product $product, Request $request)
    {
        try {
            $data = $request->only(['name', 'price']);
            $product = $this->productService->update($data, $product);
            return response()->json($product, 200);
        } catch (\Exception $ex) {
            return response()->json([
                'error' => true
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        try {
            $this->productService->delete($product);
            return response()->json([], 200);
        } catch (\Exception $ex) {
            return response()->json([
                'error' => true
            ], 500);
        }
    }
}

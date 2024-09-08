<?php

namespace App\Modules\Product\Controllers;

use App\Modules\Product\Services\ProductService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    protected $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function index()
    {
        $products = $this->productService->getAllProducts();
        return view('products.index', compact('products'));
    }

    public function show($id)
    {
        $product = $this->productService->getProductById($id);

        if (!$product) {
            return response()->json(['error' => 'Product not found'], 404);
        }

        return response()->json($product);
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|exists:users,id',
            'barcode' => 'required|string|unique:products,barcode',
            'internal_ref' => 'required|string|unique:products,internal_ref',
            'name' => 'required|string|max:255',
            'quantity_product' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return redirect()->route('products.create')
                             ->withErrors($validator)
                             ->withInput();
        }

        try {
            $product = $this->productService->createProduct($request->all());
            return redirect()->route('products.index')->with('success', 'Product created successfully');
        } catch (\Exception $e) {
            return redirect()->route('products.create')->with('error', 'Failed to create product');
        }
    }

    public function edit($id)
    {
        $product = $this->productService->getProductById($id);

        if (!$product) {
            return redirect()->route('products.index')->with('error', 'Product not found');
        }

        return view('products.edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'sometimes|required|exists:users,id',
            'barcode' => 'sometimes|required|string|unique:products,barcode,' . $id,
            'internal_ref' => 'sometimes|required|string|unique:products,internal_ref,' . $id,
            'name' => 'sometimes|required|string|max:255',
            'quantity_product' => 'sometimes|required|integer',
        ]);

        if ($validator->fails()) {
            return redirect()->route('products.edit', $id)
                             ->withErrors($validator)
                             ->withInput();
        }

        try {
            $this->productService->updateProduct($id, $request->all());
            return redirect()->route('products.index')->with('success', 'Product updated successfully');
        } catch (\Exception $e) {
            return redirect()->route('products.edit', $id)->with('error', 'Failed to update product');
        }
    }

    public function destroy($id)
    {
        try {
            $this->productService->deleteProduct($id);
            return redirect()->route('products.index')->with('success', 'Product deleted successfully');
        } catch (\Exception $e) {
            return redirect()->route('products.index')->with('error', 'Failed to delete product');
        }
    }
}
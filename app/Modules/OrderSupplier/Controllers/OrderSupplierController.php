<?php

namespace App\Modules\OrderSupplier\Controllers;

use App\Modules\OrderSupplier\Services\OrderSupplierService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderSupplierController extends Controller
{
    protected $orderSupplierService;

    public function __construct(OrderSupplierService $orderSupplierService)
    {
        $this->orderSupplierService = $orderSupplierService;
    }

    public function index()
    {
        $orderSuppliers = $this->orderSupplierService->getAllOrderSuppliers();
        return view('order_suppliers.index', compact('orderSuppliers'));
    }

    public function show($id)
    {
        $orderSupplier = $this->orderSupplierService->getOrderSupplierById($id);

        if (!$orderSupplier) {
            return response()->json(['error' => 'Order Supplier not found'], 404);
        }

        return response()->json($orderSupplier);
    }

    public function create()
    {
        return view('order_suppliers.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|exists:users,id',
            'product_id' => 'required|exists:products,id',
            'status' => 'required|string|max:255',
            'quantity' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return redirect()->route('order_suppliers.create')
                             ->withErrors($validator)
                             ->withInput();
        }

        try {
            $orderSupplier = $this->orderSupplierService->createOrderSupplier($request->all());
            return redirect()->route('order_suppliers.index')->with('success', 'Order Supplier created successfully');
        } catch (\Exception $e) {
            return redirect()->route('order_suppliers.create')->with('error', 'Failed to create order supplier');
        }
    }

    public function edit($id)
    {
        $orderSupplier = $this->orderSupplierService->getOrderSupplierById($id);

        if (!$orderSupplier) {
            return redirect()->route('order_suppliers.index')->with('error', 'Order Supplier not found');
        }

        return view('order_suppliers.edit', compact('orderSupplier'));
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'sometimes|required|exists:users,id',
            'product_id' => 'sometimes|required|exists:products,id',
            'status' => 'sometimes|required|string|max:255',
            'quantity' => 'sometimes|required|integer',
        ]);

        if ($validator->fails()) {
            return redirect()->route('order_suppliers.edit', $id)
                             ->withErrors($validator)
                             ->withInput();
        }

        try {
            $this->orderSupplierService->updateOrderSupplier($id, $request->all());
            return redirect()->route('order_suppliers.index')->with('success', 'Order Supplier updated successfully');
        } catch (\Exception $e) {
            return redirect()->route('order_suppliers.edit', $id)->with('error', 'Failed to update order supplier');
        }
    }

    public function destroy($id)
    {
        try {
            $this->orderSupplierService->deleteOrderSupplier($id);
            return redirect()->route('order_suppliers.index')->with('success', 'Order Supplier deleted successfully');
        } catch (\Exception $e) {
            return redirect()->route('order_suppliers.index')->with('error', 'Failed to delete order supplier');
        }
    }
}
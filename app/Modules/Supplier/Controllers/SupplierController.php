<?php

namespace App\Modules\Supplier\Controllers;

use App\Modules\Supplier\Services\SupplierService;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;

class SupplierController extends Controller
{
    protected $supplierService;

    public function __construct(SupplierService $supplierService)
    {
        $this->supplierService = $supplierService;
    }

    public function index()
    {
        $suppliers = $this->supplierService->getAllSuppliers();
        return view('suppliers.index', compact('suppliers'));
    }

    public function show($id)
    {
        $supplier = $this->supplierService->getSupplierById($id);

        if (!$supplier) {
            return response()->json(['error' => 'Supplier not found'], 404);
        }

        return response()->json($supplier);
    }

    public function create()
    {
        return view('suppliers.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'telephone' => 'required|string|max:20',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8',
        ]);

        if ($validator->fails()) {
            return redirect()->route('suppliers.create')
                             ->withErrors($validator)
                             ->withInput();
        }

        try {
            $supplier = $this->supplierService->createSupplier($request->all());
            return redirect()->route('suppliers.index')->with('success', 'Supplier created successfully');
        } catch (\Exception $e) {
            return redirect()->route('suppliers.create')->with('error', 'Failed to create supplier');
        }
    }

    public function edit($id)
    {
        $supplier = $this->supplierService->getSupplierById($id);

        if (!$supplier) {
            return redirect()->route('suppliers.index')->with('error', 'Supplier not found');
        }

        return view('suppliers.edit', compact('supplier'));
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => 'sometimes|required|string|max:255',
            'last_name' => 'sometimes|required|string|max:255',
            'telephone' => 'sometimes|required|string|max:20',
            'email' => 'sometimes|required|email|unique:users,email,' . $id,
            'password' => 'sometimes|nullable|string|min:8',
        ]);

        if ($validator->fails()) {
            return redirect()->route('suppliers.edit', $id)
                             ->withErrors($validator)
                             ->withInput();
        }

        try {
            $this->supplierService->updateSupplier($id, $request->all());
            return redirect()->route('suppliers.index')->with('success', 'Supplier updated successfully');
        } catch (\Exception $e) {
            return redirect()->route('suppliers.edit', $id)->with('error', 'Failed to update supplier');
        }
    }

    public function destroy($id)
    {
        try {
            $this->supplierService->deleteSupplier($id);
            return redirect()->route('suppliers.index')->with('success', 'Supplier deleted successfully');
        } catch (\Exception $e) {
            return redirect()->route('suppliers.index')->with('error', 'Failed to delete supplier');
        }
    }
}
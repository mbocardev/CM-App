<?php

namespace App\Modules\Supplier\Repositories;

use App\Models\User;

class SupplierRepository implements SupplierInterface
{
    public function getAllSuppliers()
    {
        return User::where('type', 'supplier')->get();
    }

    public function getSupplierById($id)
    {
        return User::where('type', 'supplier')->findOrFail($id);
    }

    public function createSupplier(array $data)
    {
        $data['type'] = 'supplier';
        return User::create($data);
    }

    public function updateSupplier($id, array $data)
    {
        $supplier = User::where('type', 'supplier')->findOrFail($id);
        $supplier->update($data);
        return $supplier;
    }

    public function deleteSupplier($id)
    {
        $supplier = User::where('type', 'supplier')->findOrFail($id);
        return $supplier->delete();
    }
}
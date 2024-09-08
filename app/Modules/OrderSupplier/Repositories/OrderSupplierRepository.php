<?php

namespace App\Modules\OrderSupplier\Repositories;

use App\Models\OrderSupplier;

class OrderSupplierRepository implements OrderSupplierInterface
{
    public function getAllOrderSuppliers()
    {
        return OrderSupplier::all();
    }

    public function getOrderSupplierById($id)
    {
        return OrderSupplier::findOrFail($id);
    }

    public function createOrderSupplier(array $data)
    {
        return OrderSupplier::create($data);
    }

    public function updateOrderSupplier($id, array $data)
    {
        $orderSupplier = OrderSupplier::findOrFail($id);
        $orderSupplier->update($data);
        return $orderSupplier;
    }

    public function deleteOrderSupplier($id)
    {
        $orderSupplier = OrderSupplier::findOrFail($id);
        return $orderSupplier->delete();
    }
}
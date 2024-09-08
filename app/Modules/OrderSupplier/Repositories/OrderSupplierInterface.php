<?php

namespace App\Modules\OrderSupplier\Repositories;

interface OrderSupplierInterface
{
    public function getAllOrderSuppliers();
    public function getOrderSupplierById($id);
    public function createOrderSupplier(array $data);
    public function updateOrderSupplier($id, array $data);
    public function deleteOrderSupplier($id);
}
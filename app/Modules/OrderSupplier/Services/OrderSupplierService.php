<?php

namespace App\Modules\OrderSupplier\Services;

use App\Modules\OrderSupplier\Repositories\OrderSupplierInterface;

class OrderSupplierService
{
    protected $orderSupplierRepository;

    public function __construct(OrderSupplierInterface $orderSupplierRepository)
    {
        $this->orderSupplierRepository = $orderSupplierRepository;
    }

    public function getAllOrderSuppliers()
    {
        return $this->orderSupplierRepository->getAllOrderSuppliers();
    }

    public function getOrderSupplierById($id)
    {
        return $this->orderSupplierRepository->getOrderSupplierById($id);
    }

    public function createOrderSupplier(array $data)
    {
        return $this->orderSupplierRepository->createOrderSupplier($data);
    }

    public function updateOrderSupplier($id, array $data)
    {
        return $this->orderSupplierRepository->updateOrderSupplier($id, $data);
    }

    public function deleteOrderSupplier($id)
    {
        return $this->orderSupplierRepository->deleteOrderSupplier($id);
    }
}
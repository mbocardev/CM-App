<?php

namespace App\Modules\Supplier\Services;

use App\Modules\Supplier\Repositories\SupplierInterface;

class SupplierService
{
    protected $supplierRepository;

    public function __construct(SupplierInterface $supplierRepository)
    {
        $this->supplierRepository = $supplierRepository;
    }

    public function getAllSuppliers()
    {
        return $this->supplierRepository->getAllSuppliers();
    }

    public function getSupplierById($id)
    {
        return $this->supplierRepository->getSupplierById($id);
    }

    public function createSupplier(array $data)
    {
        return $this->supplierRepository->createSupplier($data);
    }

    public function updateSupplier($id, array $data)
    {
        return $this->supplierRepository->updateSupplier($id, $data);
    }

    public function deleteSupplier($id)
    {
        return $this->supplierRepository->deleteSupplier($id);
    }
}
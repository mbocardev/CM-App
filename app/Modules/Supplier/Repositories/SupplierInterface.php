<?php

namespace App\Modules\Supplier\Repositories;

interface SupplierInterface
{
    public function getAllSuppliers();
    public function getSupplierById($id);
    public function createSupplier(array $data);
    public function updateSupplier($id, array $data);
    public function deleteSupplier($id);
}
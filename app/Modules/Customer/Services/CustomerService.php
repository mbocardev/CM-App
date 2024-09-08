<?php

namespace App\Modules\Customer\Services;

use App\Modules\Customer\Repositories\CustomerInterface;

class CustomerService
{
    protected $customerRepository;

    public function __construct(CustomerInterface $customerRepository)
    {
        $this->customerRepository = $customerRepository;
    }

    public function getAllCustomers()
    {
        return $this->customerRepository->getAllCustomers();
    }

    public function getCustomerById($id)
    {
        return $this->customerRepository->getCustomerById($id);
    }

    public function createCustomer(array $data)
    {
        return $this->customerRepository->createCustomer($data);
    }

    public function updateCustomer($id, array $data)
    {
        return $this->customerRepository->updateCustomer($id, $data);
    }

    public function deleteCustomer($id)
    {
        return $this->customerRepository->deleteCustomer($id);
    }
}
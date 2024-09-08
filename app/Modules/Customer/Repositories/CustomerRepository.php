<?php

namespace App\Modules\Customer\Repositories;

use App\Models\User;

class CustomerRepository implements CustomerInterface
{
    public function getAllCustomers()
    {
        return User::where('type', 'customer')->get();
    }

    public function getCustomerById($id)
    {
        return User::where('type', 'customer')->findOrFail($id);
    }

    public function createCustomer(array $data)
    {
        $data['type'] = 'customer';
        return User::create($data);
    }

    public function updateCustomer($id, array $data)
    {
        $customer = User::where('type', 'customer')->findOrFail($id);
        $customer->update($data);
        return $customer;
    }

    public function deleteCustomer($id)
    {
        $customer = User::where('type', 'customer')->findOrFail($id);
        return $customer->delete();
    }
}
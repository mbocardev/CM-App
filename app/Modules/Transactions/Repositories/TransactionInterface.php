<?php

namespace App\Modules\transaction\Repositories;

interface transactionInterface
{
    public function getAlltransactions();
    public function gettransactionById($id);
    public function createtransaction(array $data);
    public function updatetransaction($id, array $data);
    public function deletetransaction($id);
}
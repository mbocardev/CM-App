<?php

namespace App\Modules\Transaction\Services;

use App\Modules\Transaction\Repositories\TransactionInterface;

class TransactionService
{
    protected $transactionRepository;

    public function __construct(TransactionInterface $transactionRepository)
    {
        $this->transactionRepository = $transactionRepository;
    }

    public function getAllTransactions()
    {
        return $this->transactionRepository->getAllTransactions();
    }

    public function getTransactionById($id)
    {
        return $this->transactionRepository->getTransactionById($id);
    }

    public function createTransaction(array $data)
    {
        return $this->transactionRepository->createTransaction($data);
    }

    public function updateTransaction($id, array $data)
    {
        return $this->transactionRepository->updateTransaction($id, $data);
    }

    public function deleteTransaction($id)
    {
        return $this->transactionRepository->deleteTransaction($id);
    }
}
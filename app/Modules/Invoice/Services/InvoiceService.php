<?php

namespace App\Modules\Invoice\Services;

use App\Modules\Invoice\Repositories\InvoiceInterface;

class InvoiceService
{
    protected $invoiceRepository;

    public function __construct(InvoiceInterface $invoiceRepository)
    {
        $this->invoiceRepository = $invoiceRepository;
    }

    public function getAllInvoices()
    {
        return $this->invoiceRepository->getAllInvoices();
    }

    public function getInvoiceById($id)
    {
        return $this->invoiceRepository->getInvoiceById($id);
    }

    public function createInvoice(array $data)
    {
        return $this->invoiceRepository->createInvoice($data);
    }

    public function updateInvoice($id, array $data)
    {
        return $this->invoiceRepository->updateInvoice($id, $data);
    }

    public function deleteInvoice($id)
    {
        return $this->invoiceRepository->deleteInvoice($id);
    }
}
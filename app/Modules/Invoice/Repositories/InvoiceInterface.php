<?php

namespace App\Modules\Invoice\Repositories;

interface InvoiceInterface
{
    public function getAllInvoices();
    public function getInvoiceById($id);
    public function createInvoice(array $data);
    public function updateInvoice($id, array $data);
    public function deleteInvoice($id);
}
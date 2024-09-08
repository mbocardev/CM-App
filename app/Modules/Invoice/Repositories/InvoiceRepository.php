<?php

namespace App\Modules\Invoice\Repositories;

use App\Models\Invoice;

class InvoiceRepository implements InvoiceInterface
{
    public function getAllInvoices()
    {
        return Invoice::all();
    }

    public function getInvoiceById($id)
    {
        return Invoice::findOrFail($id);
    }

    public function createInvoice(array $data)
    {
        return Invoice::create($data);
    }

    public function updateInvoice($id, array $data)
    {
        $invoice = Invoice::findOrFail($id);
        $invoice->update($data);
        return $invoice;
    }

    public function deleteInvoice($id)
    {
        $invoice = Invoice::findOrFail($id);
        return $invoice->delete();
    }
}
<?php

namespace App\Modules\Invoice\Controllers;

use App\Modules\Invoice\Services\InvoiceService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class InvoiceController extends Controller
{
    protected $invoiceService;

    public function __construct(InvoiceService $invoiceService)
    {
        $this->invoiceService = $invoiceService;
    }

    public function index()
    {
        $invoices = $this->invoiceService->getAllInvoices();
        return view('invoices.index', compact('invoices'));
    }

    public function show($id)
    {
        $invoice = $this->invoiceService->getInvoiceById($id);

        if (!$invoice) {
            return response()->json(['error' => 'Invoice not found'], 404);
        }

        return response()->json($invoice);
    }

    public function create()
    {
        return view('invoices.create');
    }

    public function store(Request $request)
    {
        try {
            $invoice = $this->invoiceService->createInvoice($request->all());
            return redirect()->route('invoices.index')->with('success', 'Invoice created successfully');
        } catch (\Exception $e) {
            return redirect()->route('invoices.create')->with('error', 'Failed to create invoice');
        }
    }

    public function edit($id)
    {
        $invoice = $this->invoiceService->getInvoiceById($id);

        if (!$invoice) {
            return redirect()->route('invoices.index')->with('error', 'Invoice not found');
        }

        return view('invoices.edit', compact('invoice'));
    }

    public function update(Request $request, $id)
    {
        try {
            $this->invoiceService->updateInvoice($id, $request->all());
            return redirect()->route('invoices.index')->with('success', 'Invoice updated successfully');
        } catch (\Exception $e) {
            return redirect()->route('invoices.edit', $id)->with('error', 'Failed to update invoice');
        }
    }

    public function destroy($id)
    {
        try {
            $this->invoiceService->deleteInvoice($id);
            return redirect()->route('invoices.index')->with('success', 'Invoice deleted successfully');
        } catch (\Exception $e) {
            return redirect()->route('invoices.index')->with('error', 'Failed to delete invoice');
        }
    }
}
<?php

namespace App\Modules\Quote\Controllers;

use App\Modules\Quote\Services\QuoteService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class QuoteController extends Controller
{
    protected $quoteService;

    public function __construct(QuoteService $quoteService)
    {
        $this->quoteService = $quoteService;
    }

    public function index()
    {
        $quotes = $this->quoteService->getAllQuotes();
        return view('quotes.index', compact('quotes'));
    }

    public function show($id)
    {
        $quote = $this->quoteService->getQuoteById($id);

        if (!$quote) {
            return response()->json(['error' => 'Quote not found'], 404);
        }

        return response()->json($quote);
    }

    public function create()
    {
        return view('quotes.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'product_id' => 'required|exists:products,id',
            'user_id' => 'required|exists:users,id',
        ]);

        if ($validator->fails()) {
            return redirect()->route('quotes.create')
                             ->withErrors($validator)
                             ->withInput();
        }

        try {
            $quote = $this->quoteService->createQuote($request->all());
            return redirect()->route('quotes.index')->with('success', 'Quote created successfully');
        } catch (\Exception $e) {
            return redirect()->route('quotes.create')->with('error', 'Failed to create quote');
        }
    }

    public function edit($id)
    {
        $quote = $this->quoteService->getQuoteById($id);

        if (!$quote) {
            return redirect()->route('quotes.index')->with('error', 'Quote not found');
        }

        return view('quotes.edit', compact('quote'));
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'product_id' => 'sometimes|required|exists:products,id',
            'user_id' => 'sometimes|required|exists:users,id',
        ]);

        if ($validator->fails()) {
            return redirect()->route('quotes.edit', $id)
                             ->withErrors($validator)
                             ->withInput();
        }

        try {
            $this->quoteService->updateQuote($id, $request->all());
            return redirect()->route('quotes.index')->with('success', 'Quote updated successfully');
        } catch (\Exception $e) {
            return redirect()->route('quotes.edit', $id)->with('error', 'Failed to update quote');
        }
    }

    public function destroy($id)
    {
        try {
            $this->quoteService->deleteQuote($id);
            return redirect()->route('quotes.index')->with('success', 'Quote deleted successfully');
        } catch (\Exception $e) {
            return redirect()->route('quotes.index')->with('error', 'Failed to delete quote');
        }
    }
}
<?php

namespace App\Modules\Quote\Repositories;

use App\Models\Quote;

class QuoteRepository implements QuoteInterface
{
    public function getAllQuotes()
    {
        return Quote::all();
    }

    public function getQuoteById($id)
    {
        return Quote::findOrFail($id);
    }

    public function createQuote(array $data)
    {
        return Quote::create($data);
    }

    public function updateQuote($id, array $data)
    {
        $quote = Quote::findOrFail($id);
        $quote->update($data);
        return $quote;
    }

    public function deleteQuote($id)
    {
        $quote = Quote::findOrFail($id);
        return $quote->delete();
    }
}
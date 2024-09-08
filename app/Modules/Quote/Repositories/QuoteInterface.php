<?php

namespace App\Modules\Quote\Repositories;

interface QuoteInterface
{
    public function getAllQuotes();
    public function getQuoteById($id);
    public function createQuote(array $data);
    public function updateQuote($id, array $data);
    public function deleteQuote($id);
}
<?php

namespace App\Modules\Quote\Services;

use App\Modules\Quote\Repositories\QuoteInterface;

class QuoteService
{
    protected $quoteRepository;

    public function __construct(QuoteInterface $quoteRepository)
    {
        $this->quoteRepository = $quoteRepository;
    }

    public function getAllQuotes()
    {
        return $this->quoteRepository->getAllQuotes();
    }

    public function getQuoteById($id)
    {
        return $this->quoteRepository->getQuoteById($id);
    }

    public function createQuote(array $data)
    {
        return $this->quoteRepository->createQuote($data);
    }

    public function updateQuote($id, array $data)
    {
        return $this->quoteRepository->updateQuote($id, $data);
    }

    public function deleteQuote($id)
    {
        return $this->quoteRepository->deleteQuote($id);
    }
}
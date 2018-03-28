<?php

namespace App\Methods;

class GetBooks
{
    protected $client;

    public function __construct($client)
    {
        $this->client = $client;
    }

    public function execute($parameters)
    {
        $response = $this->client->getBooks();

        // Transform the response as appropriate...

        return $response;
    }
}
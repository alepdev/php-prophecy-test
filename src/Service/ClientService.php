<?php

declare(strict_types=1);

namespace App\Service;

use App\Exception\RequestErrorException;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class ClientService
{
    private $httpClient;

    public function __construct(HttpClientInterface $httpClient)
    {
        $this->httpClient = $httpClient;
    }

    public function execute()
    {
        try {
            $this->httpClient->request('GET', 'https://google.com');
        } catch (TransportExceptionInterface $e) {
            throw new RequestErrorException();
        }
    }
}

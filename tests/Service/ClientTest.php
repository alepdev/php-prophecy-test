<?php

declare(strict_types=1);

namespace Tests\Service;

use App\Exception\RequestErrorException;
use App\Service\ClientService;
use PHPUnit\Framework\TestCase;
use Prophecy\Argument;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;

final class ClientServiceTest extends TestCase
{
    /**
     * @test
     */
    public function execute_WillThrowThrowable()
    {
        $httpClientObserver = $this->prophesize(HttpClientInterface::class);

        // HttpClient request throw TransportExceptionInterface
        $httpClientObserver
            ->request(Argument::type('string'), Argument::type('string'))
            ->willThrow(\Throwable::class);

        // Instantiate Client
        $client = new ClientService(
            $httpClientObserver->reveal()
        );

        $this->expectException(RequestErrorException::class);

        $client->execute();
    }

    /**
     * @test
     */
    public function execute_WillThrowException()
    {
        $httpClientObserver = $this->prophesize(HttpClientInterface::class);

        // HttpClient request throw TransportExceptionInterface
        $httpClientObserver
            ->request(Argument::type('string'), Argument::type('string'))
            ->willThrow(TransportExceptionInterface::class);

        // Instantiate Client
        $client = new ClientService(
            $httpClientObserver->reveal()
        );

        $this->expectException(RequestErrorException::class);

        $client->execute();
    }

    /**
     * @test
     */
    public function execute_WillThrowProphesizedException()
    {
        $httpClientObserver = $this->prophesize(HttpClientInterface::class);

        // HttpClient request throw TransportExceptionInterface
        $httpClientObserver
            ->request(Argument::type('string'), Argument::type('string'))
            ->willThrow($this->prophesize(TransportExceptionInterface::class)->reveal());

        // Instantiate Client
        $client = new ClientService(
            $httpClientObserver->reveal()
        );

        $this->expectException(RequestErrorException::class);

        $client->execute();
    }
}

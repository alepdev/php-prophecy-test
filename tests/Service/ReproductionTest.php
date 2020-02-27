<?php

declare(strict_types=1);

namespace Tests\Service;

use PHPUnit\Framework\TestCase;
use Prophecy\Argument;

final class ReproductionTest extends \PHPUnit\Framework\TestCase
{
    public function testThrowable()
    {
        $client = $this->prophesize(\Psr\Http\Client\ClientInterface::class);
        $client->sendRequest(Argument::type(\Psr\Http\Message\RequestInterface::class))
            ->willThrow(\Psr\Http\Client\ClientExceptionInterface::class);

        // do assertions
        $pippo = $client->reveal();

        $request = $this->prophesize(\Psr\Http\Message\RequestInterface::class)->reveal();

        $this->expectException(\Psr\Http\Client\ClientExceptionInterface::class);

        $pippo->sendRequest($request);
    }

    public function testThrowableProhesized()
    {

        $exception = $this->prophesize(\Psr\Http\Client\ClientExceptionInterface::class)->reveal();
        $client = $this->prophesize(\Psr\Http\Client\ClientInterface::class);
        $client->sendRequest(Argument::type(\Psr\Http\Message\RequestInterface::class))
            ->willThrow($exception);

        // do assertions
        $pippo = $client->reveal();

        $request = $this->prophesize(\Psr\Http\Message\RequestInterface::class)->reveal();

        $this->expectException(\Psr\Http\Client\ClientExceptionInterface::class);

        $pippo->sendRequest($request);
    }

}
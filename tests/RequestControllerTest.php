<?php

namespace App\Tests;

use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Symfony\Component\Panther\PantherTestCase;

class RequestControllerTest extends PantherTestCase
{
    use JsonRequestTrait;

    public function testMano200()
    {
        $client = $this->jsonRequest(
            static::createClient(),
            'POST',
            '/v1/logs',
            [
                'userId' => '95fab0fa-dbcc-445d-b5c1-8dfaf2a07e72',
                'timestamp' => 1568034144
            ]
        );

        $this->assertResponseIsSuccessful();
        $this->assertResponseHeaderSame('Content-Type', 'application/json');
    }

    public function testMano400()
    {
        $this->expectException(BadRequestHttpException::class);
        $this->expectExceptionMessage('Invalid parameter timestamp: must be an integer');

        $client = $this->jsonRequest(
            static::createClient(),
            'POST',
            '/v1/logs',
            [
                'userId' => '95fab0fa-dbcc-445d-b5c1-8dfaf2a07e72',
                'timestamp' => '2019-09-09 15:20:31'
            ]
        );
    }

    public function testDto200()
    {
        $client = $this->jsonRequest(
            static::createClient(),
            'POST',
            '/v2/logs',
            [
                'userId' => '95fab0fa-dbcc-445d-b5c1-8dfaf2a07e72',
                'timestamp' => 1568034144
            ]
        );

        $this->assertResponseIsSuccessful();
        $this->assertResponseHeaderSame('Content-Type', 'application/json');
    }

    public function testDto400()
    {
        $client = $this->jsonRequest(
            static::createClient(),
            'POST',
            '/v2/logs',
            [
                'userId' => '95fab0fa-dbcc-445d-b5c1-8dfaf2a07e72',
                'timestamp' => '2019-09-09 15:20:31'
            ]
        );

        $this->assertResponseStatusCodeSame(400);
        $this->assertResponseHeaderSame('Content-Type', 'application/json');
        $content = json_decode($client->getResponse()->getContent());
        $this->assertSame('timestamp: This value should be of type integer.', $content->detail);
    }

    public function testMessage200()
    {
        $client = $this->jsonRequest(
            static::createClient(),
            'POST',
            '/v3/logs',
            [
                'userId' => '95fab0fa-dbcc-445d-b5c1-8dfaf2a07e72',
                'timestamp' => 1568034144
            ]
        );

        $this->assertResponseIsSuccessful();
        $this->assertResponseHeaderSame('Content-Type', 'application/json');
    }
}

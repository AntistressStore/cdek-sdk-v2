<?php

namespace AntistressStore\Test\Unit;

use AntistressStore\CdekSDK2\CdekClientV2;
use AntistressStore\CdekSDK2\Entity\Requests\Order;
use AntistressStore\CdekSDK2\Entity\Responses\{EntityResponse};
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\{Client as GuzzleClient, HandlerStack};
use PHPUnit\Framework\TestCase;

class OrderOperationsTest extends TestCase
{
    private function getMockedClient(array $responses)
    {
        $mock = new MockHandler($responses);
        $handlerStack = HandlerStack::create($mock);
        $client = new CdekClientV2('TEST');

        return $client->setHttp(new GuzzleClient(['handler' => $handlerStack]));
    }

    private function getAuthResponse()
    {
        return new Response(200, [], json_encode(['access_token' => 'token', 'expires_in' => 3600]));
    }

    public function testUpdateOrder()
    {
        $client = $this->getMockedClient([
            $this->getAuthResponse(),
            new Response(200, [], json_encode([
                'entity' => ['uuid' => 'uuid-123'],
                'requests' => [['request_uuid' => 'req-1', 'type' => 'UPDATE', 'state' => 'ACCEPTED']],
            ])),
        ]);

        $order = (new Order())->setNumber('Update-123');
        $response = $client->updateOrder($order);

        $this->assertInstanceOf(EntityResponse::class, $response);
        $this->assertEquals('ACCEPTED', $response->getRequests()[0]->getState());
    }

    public function testCancelOrder()
    {
        $client = $this->getMockedClient([
            $this->getAuthResponse(),
            new Response(200, [], json_encode([
                'entity' => ['uuid' => 'uuid-123'],
                'requests' => [['request_uuid' => 'req-refusal', 'type' => 'REFUSAL', 'state' => 'ACCEPTED']],
            ])),
        ]);

        $response = $client->cancelOrder('uuid-123');
        $this->assertInstanceOf(EntityResponse::class, $response);
    }

    public function testDeleteOrder()
    {
        // Метод deleteOrder в CdekClientV2 возвращает false, если состояние не INVALID
        $client = $this->getMockedClient([
            $this->getAuthResponse(),
            new Response(200, [], json_encode([
                'requests' => [['state' => 'ACCEPTED']],
            ])),
        ]);

        $result = $client->deleteOrder('uuid-123');
        $this->assertFalse($result);
    }
}

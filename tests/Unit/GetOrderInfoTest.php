<?php

namespace AntistressStore\Test\Unit;

use AntistressStore\CdekSDK2\CdekClientV2;
use AntistressStore\CdekSDK2\Entity\Responses\OrderResponse;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\{Client as GuzzleClient, HandlerStack};
use PHPUnit\Framework\TestCase;

class GetOrderInfoTest extends TestCase
{
    /**
     * Вспомогательный метод для создания клиента с моками.
     */
    private function getMockedClient(array $responses): CdekClientV2
    {
        $mock = new MockHandler($responses);
        $handlerStack = HandlerStack::create($mock);
        $client = new CdekClientV2('TEST');

        return $client->setHttp(new GuzzleClient(['handler' => $handlerStack]));
    }

    /**
     * Вспомогательный метод для эмуляции ответа авторизации.
     */
    private function getAuthResponse(): Response
    {
        return new Response(200, [], json_encode([
            'access_token' => 'fake_token',
            'expires_in' => 3600,
        ]));
    }

    public function testGetOrderInfoByUuidSuccess()
    {
        $orderUuid = '72120412-25e1-489e-862a-0f9c3e981985';

        $client = $this->getMockedClient([
            $this->getAuthResponse(),
            new Response(200, [], json_encode([
                'uuid' => $orderUuid,
                'type' => 1,
                'tariff_code' => 136,
                'shipment_point' => 'ORX1',
            ])),
        ]);

        $response = $client->getOrderInfoByUuid($orderUuid);

        $this->assertInstanceOf(OrderResponse::class, $response);
        $this->assertEquals($orderUuid, $response->getUuid());
        $this->assertEquals(136, $response->getTariffCode());
    }

    public function testGetOrderInfoByCdekNumber()
    {
        $client = $this->getMockedClient([
            $this->getAuthResponse(),
            new Response(200, [], json_encode([
                'cdek_number' => '1105',
                'uuid' => 'uuid-123',
            ])),
        ]);

        $response = $client->getOrderInfoByCdekNumber('1105');
        $this->assertInstanceOf(OrderResponse::class, $response);
        $this->assertEquals('1105', $response->getCdekNumber());
    }

    public function testGetOrderInfoByImNumber()
    {
        $client = $this->getMockedClient([
            $this->getAuthResponse(),
            new Response(200, [], json_encode([
                'number' => 'IM-99',
                'uuid' => 'uuid-123',
            ])),
        ]);

        $response = $client->getOrderInfoByImNumber('IM-99');
        $this->assertInstanceOf(OrderResponse::class, $response);
        $this->assertEquals('IM-99', $response->getNumber());
    }
}

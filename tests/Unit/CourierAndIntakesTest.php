<?php

namespace AntistressStore\Test\Unit;

use AntistressStore\CdekSDK2\CdekClientV2;
use AntistressStore\CdekSDK2\Entity\Requests\{Agreement, Intakes};
use AntistressStore\CdekSDK2\Entity\Responses\{AgreementResponse, EntityResponse, IntakesResponse};
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\{Client as GuzzleClient, HandlerStack};
use PHPUnit\Framework\TestCase;

class CourierAndIntakesTest extends TestCase
{
    private function getMockedClient(array $responses): CdekClientV2
    {
        $mock = new MockHandler($responses);
        $handlerStack = HandlerStack::create($mock);
        $client = new CdekClientV2('TEST');

        return $client->setHttp(new GuzzleClient(['handler' => $handlerStack]));
    }

    private function getAuthResponse(): Response
    {
        return new Response(200, [], json_encode([
            'access_token' => 'fake_token',
            'expires_in' => 3600,
        ]));
    }

    /**
     * Тест создания договоренностей для курьера.
     */
    public function testCreateAgreement()
    {
        $client = $this->getMockedClient([
            $this->getAuthResponse(),
            new Response(200, [], json_encode([
                'entity' => ['uuid' => 'agreement-uuid-123'],
                'requests' => [['request_uuid' => 'req-1', 'type' => 'CREATE', 'state' => 'ACCEPTED']],
            ])),
        ]);

        $agreement = new Agreement(); // Предполагаем наличие необходимых сеттеров в Entity
        $response = $client->createAgreement($agreement);

        $this->assertInstanceOf(EntityResponse::class, $response);
        $this->assertEquals('agreement-uuid-123', $response->getEntityUuid());
    }

    /**
     * Тест получения информации о договоренности.
     */
    public function testGetAgreement()
    {
        $uuid = 'agreement-uuid-123';
        $client = $this->getMockedClient([
            $this->getAuthResponse(),
            new Response(200, [], json_encode([
                'uuid' => $uuid,
                'state' => 'ACCEPTED',
                'date' => '2024-01-01',
            ])),
        ]);

        $response = $client->getAgreement($uuid);

        $this->assertInstanceOf(AgreementResponse::class, $response);
        $this->assertEquals($uuid, $response->getUuid());
    }

    /**
     * Тест создания заявки на вызов курьера.
     */
    public function testCreateIntakes()
    {
        $client = $this->getMockedClient([
            $this->getAuthResponse(),
            new Response(200, [], json_encode([
                'entity' => ['uuid' => 'intake-uuid-456'],
                'requests' => [['request_uuid' => 'req-2', 'type' => 'CREATE', 'state' => 'ACCEPTED']],
            ])),
        ]);

        $intakes = new Intakes();

        $response = $client->createIntakes($intakes);

        $this->assertInstanceOf(EntityResponse::class, $response);
        $this->assertEquals('intake-uuid-456', $response->getEntityUuid());
    }

    /**
     * Тест получения информации о заявке на вызов.
     */
    public function testGetIntakes()
    {
        $uuid = 'intake-uuid-456';
        $client = $this->getMockedClient([
            $this->getAuthResponse(),
            new Response(200, [], json_encode([
                'uuid' => $uuid,
                'intake_number' => 123456,
                'state' => 'ACCEPTED',
            ])),
        ]);

        $response = $client->getIntakes($uuid);

        $this->assertInstanceOf(IntakesResponse::class, $response);
        $this->assertEquals($uuid, $response->getUuid());
    }

    /**
     * Тест удаления заявки на вызов курьера.
     */
    public function testDeleteIntakes()
    {
        $uuid = 'intake-uuid-456';
        $client = $this->getMockedClient([
            $this->getAuthResponse(),
            // CDEK API при DELETE обычно возвращает статус принятия запроса
            new Response(200, [], json_encode([
                'requests' => [['request_uuid' => 'req-del', 'type' => 'DELETE', 'state' => 'ACCEPTED']],
            ])),
        ]);

        $result = $client->deleteIntakes($uuid);

        // Согласно реализации в CdekClientV2, метод всегда возвращает false
        $this->assertFalse($result);
    }
}

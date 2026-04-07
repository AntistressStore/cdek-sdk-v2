<?php

namespace AntistressStore\Test\Unit;

use AntistressStore\CdekSDK2\CdekClientV2;
use AntistressStore\CdekSDK2\Entity\Requests\Check;
use AntistressStore\CdekSDK2\Entity\Responses\{CheckResponse, PaymentResponse, RegistryResponse};
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\{Client as GuzzleClient, HandlerStack};
use PHPUnit\Framework\TestCase;

class FinancialOperationsTest extends TestCase
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
     * Тест получения реестров наложенных платежей.
     */
    public function testGetRegistries()
    {
        $date = '2024-01-01';
        $client = $this->getMockedClient([
            $this->getAuthResponse(),
            new Response(200, [], json_encode([
                'registries' => [
                    ['uuid' => 'reg-1', 'date' => $date],
                ],
            ])),
        ]);

        $response = $client->getRegistries($date);

        $this->assertInstanceOf(RegistryResponse::class, $response);
    }

    /**
     * Тест получения информации о переводе наложенного платежа.
     */
    public function testGetPayments()
    {
        $date = '2024-01-01';
        $client = $this->getMockedClient([
            $this->getAuthResponse(),
            new Response(200, [], json_encode([
                'payments' => [
                    ['payment_id' => 123, 'sum' => 1500.00],
                ],
            ])),
        ]);

        $response = $client->getPayments($date);

        $this->assertInstanceOf(PaymentResponse::class, $response);
    }

    /**
     * Тест получения информации о чеках.
     */
    public function testGetChecks()
    {
        $orderUuid = 'order-uuid-123';
        $date = '2024-03-25';
        $fiscalStorage = '1234567890123456';
        $docNumber = '777';
        $fiscalSign = '9876543210';
        $checkType = 'ADVANCE';

        $client = $this->getMockedClient([
            $this->getAuthResponse(),
            new Response(200, [], json_encode([
                'order_uuid' => $orderUuid,
                'date' => $date,
                'fiscal_storage_number' => $fiscalStorage,
                'document_number' => $docNumber,
                'fiscal_sign' => $fiscalSign,
                'type' => $checkType,
                'payment_info' => [
                    'type' => 'CASH',
                    'sum' => 1500.00,
                ],
            ])),
        ]);

        $checkRequest = (new Check())->setDate($date)->setOrderUuid($orderUuid)->setCdekNumber(1105);

        // Проверяем работу геттеров в объекте запроса перед отправкой
        $this->assertEquals($date, $checkRequest->getDate());
        $this->assertEquals($orderUuid, $checkRequest->getOrderUuid());
        $this->assertEquals(1105, $checkRequest->getCdekNumber());

        $response = $client->getChecks($checkRequest);

        // Проверка базового типа ответа
        $this->assertInstanceOf(CheckResponse::class, $response);

        // Проверка специфических геттеров CheckResponse
        $this->assertEquals($date, $response->getDate());
        $this->assertEquals($fiscalStorage, $response->getFiscalStorageNumber());
        $this->assertEquals($docNumber, $response->getDocumentNumber());
        $this->assertEquals($fiscalSign, $response->getFiscalSign());
        $this->assertEquals($checkType, $response->getType());
        $this->assertIsArray($response->getPaymentInfo());
        $this->assertEquals(1500.00, $response->getPaymentInfo()['sum']);
    }
}
